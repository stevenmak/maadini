<?php

use App\Http\Controllers\MouvementController;
use App\Mouvement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('agents','AgentsController');
    Route::resource('entreprises','EntreprisesController');
    Route::resource('roles','RolesController');
    Route::resource('users','UserController');
    Route::resource('categories','CategorieController');
    Route::resource('articles','ArticleController');
    Route::resource('mouvements','MouvementController');
    Route::resource('fournisseurs', 'FournisseurController');
    Route::resource('unite', 'UniteController');

    //les routes pour la ventes

    Route::get('/ventes','MouvementController@ventes' )->name('ventes');;
    Route::post('/ventes-save', 'MouvementController@save')->name('ventes-save');


    //les routes de la methode archiver

    Route::put('archiverAgent/{id}', 'AgentsController@archiverAgent')->name('archiverAgent');
    Route::put('archiverUser/{id}', 'UsersController@archiverUser');


    //les routes de la rapports
    Route::get('/catalogue', function(){return view('rapports.catalogue');})->name('catalogue');
    Route::get('/inventaire', function(){return view('rapports.inventaire');})->name('inventaire');
    Route::get('/getPrixMateriel', 'MouvementController@getDetailMateriel')->name('getPrixMateriel');
});
