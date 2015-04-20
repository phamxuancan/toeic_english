<?php
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('/users/authentication', 'UserController@authentication');
Route::post('/users/authentication', 'UserController@authentication');
Route::get('/users/testsignup',function(){
    $input = array(
        'username'=>'xuancan',
        'password'=> ('123456')
    );
   App\User::create(
   array(
       'username'=>'xuancan',
       'password'=> Hash::make('123456')
       )
   );
    try{
        var_dump(Auth::attempt($input));
    }catch (Exception $e){
        echo $e->getMessage();
    }

});
Route::get('/users/home','UserController@index');
Route::get('/users/signup', 'UserController@signup');
Route::post('/users/signup', 'UserController@signup');
$router->group(['middleware' => 'auth'],function(){

});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
