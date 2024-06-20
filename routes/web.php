<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistrationController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\DistanceController;
use App\Http\Controllers\TrueCallerController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
     return view('welcome');
 });

// Route::get('/{lang?}', function ($lang = null) {
//    App::setLocale($lang);
//     return view('welcome');
// });

// Route::get('/demo', function(){
//     echo "hello world!!";
// });

// Route::get('hii', function(){
//     return view('thakur');
// });

// Route::get('thakur/{name}/{id?}', function($name, $id = null){
//     $data = compact('name', 'id');
//     return view('thakur')->with($data);
// });

// Route::get('home/{name?}/{id?}', function($name=null, $id=null){
//     $data = compact('name', 'id');
//     return view("conditionalStatement")->with($data);
// });
// Route::get('loop', function(){
//     return view("loop");
// });

// Route::get("homm", [BasicController::class, "home"]);

// Route::get("/course", SingleActionController::class);

// Route::resource('photo', PhotoController::class );

// Route::get('/dist', [DistanceController::class, 'showForm']);
// use App\Http\Controllers\DistanceController;



//  TrueCaller 
Route::get('/true-caller', [TrueCallerController::class, 'searchForm']);
Route::get('/contacts/search', [TrueCallerController::class, 'search']);



//  Distance Calculator

Route::get('/', [DistanceController::class, 'showFormm'])->name('calculate.distance.form');
Route::post('/calculate-distance', [DistanceController::class, 'calculateDistance'])->name('calculate.distance');
// Route::get('/getDistance2', [DistanceController::class, 'getDistance2'])->name('calculate.getDistance2');




Route::get('/navbar', [RegistrationController::class, 'index']);
Route::post('/register', [RegistrationController::class, 'register']);

Route::group(['prefix' => '/customer'] ,  function () {

    Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/view', [CustomerController::class, 'view']);
    Route::get('/trash', [CustomerController::class, 'trash']);

    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');

    Route::get('/force-delete/{id}', [CustomerController::class, 'forceDelete'])->name('customer.force.delete');
    Route::get('/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');

    Route::get('/delete-selected', [CustomerController::class, 'deleteSelected'])->name('customers.deleteSelected');
});



Route::get('ajax', [AjaxController::class, 'Ajax']);
Route::get('/JqueryAjax', [AjaxController::class, 'w3Ajax']);
Route::get('/delhiAjax', [AjaxController::class, 'delhi']);
Route::get('/noidaAjax', [AjaxController::class, 'noida']);
Route::get('/indoreAjax', [AjaxController::class, 'indore']);
Route::get('/jabalpurAjax', [AjaxController::class, 'jabalpur']);




Route::get('/w3jquery', [AjaxController::class, 'w3Jquery']);

Route::view('js', 'js');

Route::get('get-all-session', function (Request $request) {
    $session = session()->all();
    p($session);
    // dd($session);
});

Route::get('set-session', function (Request $request) {
    $request->session()->put('user_name', 'Tech-team');
    $request->session()->put('user_id', '94');
    $request->session()->flash('status', 'success');

    return redirect('get-all-session');
});

Route::get('destroy-session', function (Request $request) {
    session()->forget(['user_name', 'user_id']);
    // session()->forget('user_name');
    // session()->forget('user_id');

    return redirect('get-all-session');
});


Route::get('/importExportView', [CustomerController::class, 'importExportView']);
Route::get('/export', [CustomerController::class, 'export'])->name('export');
Route::post('/import', [CustomerController::class, 'import'])->name('import');
