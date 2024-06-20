<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Check if the customer already exists based on the email field
        $existingCustomer = Customer::where('email', $row[2])->first();

        // If the customer already exists, return null to skip inserting this row
        if ($existingCustomer) {
            return null;
        }

        return new Customer([
            'name' => $row['1'],
            'email' => $row['2'],
            'gender' => $row['3'],
            'address' => $row['4'],
            'state' => $row['5'],
            'country' => $row['6'],
            'dob' => date('Y-m-d', strtotime($row['7'])),
            'password' => md5($row['8']),
        ]);

      
    }
}
