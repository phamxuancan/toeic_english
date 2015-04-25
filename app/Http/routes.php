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

Route::get('/', 'UserController@index');
Route::get('/home', 'HomeController@index');
Route::get('/users/login', 'UserController@login');
Route::post('/users/authentication', 'UserController@authentication');
Route::get('/users/home','UserController@index');
Route::get('/users/signup', 'UserController@signup');
Route::post('/users/signup', 'UserController@signup');
Route::post('/questions/createQuestion','QuestionController@createQuestion');
Route::get('/questions','QuestionController@getAllQuestions');
Route::get('/questions/listQuestion','QuestionController@listQuestion');
Route::get('/questions/getDataEditQuestion','QuestionController@getDataEditQuestion');
Route::post('/questions/editQuestion','QuestionController@editQuestion');

Route::post('/point/add','PointController@add');
Route::get('/top','PointController@getMaxPoint');

$router->group(['middleware' => 'auth'],function(){
    Route::get('/users','UserController@index');
    Route::get('/users/logout','UserController@logout');
});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
// admin
Route::get('/admins', 'AdminController@index');
Route::get('/admins/login', 'AdminController@login');
Route::post('/admins/confirm', 'AdminController@confirm');
Route::get('/admins/user', 'AdminController@user');

//get infor php current
Route::get('/phpinfor', 'AdminController@phpinfor');

