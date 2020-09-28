<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
//khoi tao mot file view va test thu
// Route::get('/hello-world', function(){
//     return view('pages.helloWorld');
// });
//tham so tren route
// Route::get('/hello-world/{year}', function($year){
//     echo ('Hello world, ' . $year);
// });
//tham so tuy tron tren dinh tuyen route
Route::get('/hello-world/{year}/{yourname?}', function($year, $yourname = null){
    if($yourname == null){
        $hello_string = $year;
    }else{
        $hello_string = $year . '. My name is ' . $yourname;
    }
    return view('pages.web01')->with('hello_str', $hello_string);
});
//middleware
Route::get('/role',[
   'middleware' => 'role:ThucLinhadmin',
   'uses' => 'MainController@checkRole',
]);
// lay duong dan web
Route::get('hoclaravel/coban/nangcao','MainController@url');
//lay ca duong dan
Route::get('product/detail/pro01','MainController@fullUrl');
//kiem tra phuong thuc gui
Route::get('kiem-tra-phuong-thuc',function(Request $request){
	$method = $request->method();
	    if (!$request->isMethod('post')) {
	        echo 'not POST request';
	    } else {
	        echo 'not GET request';
	}
});
// vi du ve cac phuong thuc cua request
Route::get('category/laravel-nang-cao', 'MainController@uriTest'); 
//Các phương thức liên quan đến người dùng của Request
Route::get('kiem-tra-ip',function(Request $request){
// $test = $request->ip();
// $test = $request->server();
$test =	$request->header();


echo '<pre>';
var_dump($test);
echo '</pre>';

});
// tong hop cac phuong thuc kiem tra request
Route::get('user-info', 'MainController@getUserInfo');
