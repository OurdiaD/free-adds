<?php

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
Route::get('/view/user/{id}', 'UtilisateurController@user');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('/', 'IndexController@showIndex');
Route::post('/', 'IndexController@recherche');

//Route::get('/index', 'IndexController@recherche');
//Route::post('/index', 'IndexController@recherche');

Route::get('/adds', 'IndexController@recherche');


Route::get('/inscription', 'UtilisateurController@index');
Route::post('/inscription', 'UtilisateurController@create');
Route::get('/connexion', 'UtilisateurController@indexCo');
Route::post('/connexion', 'UtilisateurController@connexion');
Route::get('/verif', function() {
    return view('verif');
});
Route::get('/inscription/verif', 'UtilisateurController@verif' );

Route::get('/profil', function() {
    if(Session::has('id_user'))
    {
        //die(var_dump(Session::get('id_user')));
        return view('Utilisateurs.profil');
    }
    else
    {
        return redirect('connexion');
    }
    return view('Utilisateurs.profil');
});
Route::post('/profil', 'UtilisateurController@edit');
Route::get('/deconnexion', 'UtilisateurController@deco');
Route::get('/suppr', 'UtilisateurController@suppr');


/***********************Annonces**********************************/
Route::get('/ajout', function() {
    if(Session::has('id_user'))
    {
        return view('Annonces.ajout');
    }
    else
    {
        return redirect('connexion');
    }
});
Route::post('/ajout', 'AnnoncesController@create');
Route::get('/perso', 'AnnoncesController@view');
Route::get('/supprA', 'AnnoncesController@supprA');
/*Route::get('/modifA', function() {
        //die(var_dump(Session::get('id_user')));
        return view('Annonces.modif');
});*/
Route::get('/modifA', 'AnnoncesController@modifA');
Route::post('/modifA', 'AnnoncesController@edit');
//Route::match(['get', 'post'], '/modifA?id={id}', 'AnnoncesController@edit');
Route::get('/annonces/ajout', function() {
    if(Session::has('id_user'))
    {
        return view('Annonces.ajout');
    }
    else
    {
        return redirect('connexion');
    }
});
Route::get('/details', 'AnnoncesController@details');
Route::resource('annonces', 'AnnoncesController');
Route::get('/archive', 'AnnoncesController@archive');

/**********************Messages**********************/

Route::get('/envois', function() {
    if(Session::has('id_user'))
    {
        return view('Utilisateurs.envoi');
    }
    else
    {
        return redirect('connexion');
    }
});

Route::post('/envois', 'UtilisateurController@envois');
Route::get('/messages', ['as' => 'messages', 'uses' => 'UtilisateurController@messages']);
Route::get('/message', 'UtilisateurController@message');
Route::get('/envoyer', 'UtilisateurController@envoyer');
