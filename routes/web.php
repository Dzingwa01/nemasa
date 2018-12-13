<?php

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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['web']], function () {
    Route::get('user-profile','UsersController@getProfile');

    /**
     * Socio Economic Allowables Controoler
     */

    Route::resource('socios','SocioEconominAllowableController');
    Route::post('socios/update-details/{socio}','SocioEconominAllowableController@update');
    /**
     * Projects Controller
     */
    Route::resource('projects','ProjectController');
    Route::post('projects/update/{project}','ProjectController@update');
    Route::get('get-projects','ProjectController@getProjects')->name('get-projects');
    Route::get('project/delete/{project}','ProjectController@destroy');
    Route::get('contract-award-calculator/{project}','ProjectController@getContractAwardCalc');
    Route::get('sme-procurement-plan/{project}','ProjectController@getSMEProcurementPlan');
    Route::get('specialist-procurement-plan/{project}','ProjectController@getSpecialistProcurementPlan');
    Route::get('local-procurement-plan/{project}','ProjectController@getLocalProcurementPlan');
    Route::get('add-sme-procurement-plan/{project}','ProjectController@addSMEProcurementPlan');
    Route::get('add-local-procurement-plan/{project}','ProjectController@addLocalProcurementPlan');
    Route::get('add-specialist-procurement-plan/{project}','ProjectController@addSpecialistProcurementPlan');

    /**
     * Contractors
     */
    Route::resource('contractors','ContractorsController');
    Route::post('contractors/update-details/{contractor}','ContractorsController@update');

    /**
     * Users Controller
     */
    Route::resource('users','UsersController');
    Route::get('get-users','UsersController@getUsers')->name('get-users');
    Route::get('/user/delete/{user}','UsersController@destroy');
    Route::get('account-activation/{user}','RegisterController@verifyEmail');
    Route::get('user-profile','UsersController@getUserProfile');

    /**
     * Roles Controller
     */
    Route::resource('roles','RolesController');
    Route::get('get-roles','RolesController@getRoles')->name('get-roles');
    Route::get('/roles/delete/{role}','RolesController@destroy');
});
