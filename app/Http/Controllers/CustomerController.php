<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

use App\Imports\CustomerImport;
use App\Exports\CustomerExport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function create()
    {
        $url = url('/customer/store');
        $title = "Customer Registration";
        $customer = new Customer();
        // $customer = null;
        $data = compact('url', 'title', 'customer');
        return view("customer")->with($data);
    }

    public function store(Request $request)
    {
        // p($request->all());                // helper function p
        // die;

        // echo "<pre>";
        // print_r($request->all());
        // dd($request->all());

        $customer = new Customer;

        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->password = md5($request['password']);
        $customer->save();

        return redirect('/customer/view');
    }

    public function view(Request $request)
    {
        // $search = $request["search"] ?? "" ;
        $search = $request->search;
        if ($search != "") {
            // $customers = Customer::where('name', "LIKE", "$search%" )->orWhere('email', "LIKE", "$search%" )->get();
            $customers = Customer::where('name', "LIKE", "$search%")->orWhere('email', "LIKE", "$search%")->paginate(15);
        } else {
            $customers = Customer::paginate(15);
        }


        // $customers = Customer::all();

        $data = compact("customers", "search");
        return view('customer-view')->with($data);
    }

    public function trash()
    {
        $customers = Customer::onlyTrashed()->get();
        $data = compact('customers');
        return view('customer-trash')->with($data);
    }

    public function delete($id)
    {
        $Customer = Customer::find($id);
        if (!is_null($Customer)) {
            $Customer->delete();
        }

        return redirect()->back();
    }

    public function deleteSelected(Request $request)
    {
        // if (count($request->checkboxes)){
        if ($request->checkboxes !== null && count($request->checkboxes) > 0) {
            $Customer = Customer::whereIn('customer_id', $request->checkboxes);

            // dd($Customer, $request->checkboxes);
            $Customer->delete();
        }
        return redirect()->back();

    }

    public function restore($id)
    {
        $Customer = Customer::withTrashed()->find($id);
        if (!is_null($Customer)) {
            $Customer->restore();
        }

        return redirect()->back();
    }
    public function forceDelete($id)
    {
        $Customer = Customer::withTrashed()->find($id);
        if (!is_null($Customer)) {
            $Customer->forceDelete();
        }

        return redirect('/customer/trash');
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {

            return redirect('/customer/view');
        } else {
            $url = url('/customer/update') . "/" . $id;
            $title = "Update Customer";
            $data = compact('customer', 'url', 'title');
            return view('customer')->with($data);
        }
    }
    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->password = md5($request['password']);
        $customer->save();

        return redirect('/customer/view');
    }

    public function importExportView()
    {
        return view('import');
    }

    public function export()
    {
        return Excel::download(new CustomerExport,  'customers.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);
        // dd($request->all(), $request->file('file'));
        Excel::import(new CustomerImport, $request->file('file'));
        
        // dd($excel);
        return back()->with('success', 'File uploaded successfully');
    }



}
