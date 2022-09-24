<?php
Route::get('/', function() {
    return redirect('/index');
});

Route::get('admin', function() {
    return redirect(route('admin.dashboard'));
});

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function() {
    Route::get('dashboard', 'DashboardController')->name('dashboard');

    Route::get('users/roles', 'UserController@roles')->name('users.roles');
    Route::resource('users', 'UserController', [
        'names' => [
            'index' => 'users'
        ]
    ]);
});

Route::middleware('auth')->get('logout', function() {
    Auth::logout();
    return redirect(route('login'))->withInfo('You have successfully logged out!');
})->name('logout');

Auth::routes(['verify' => true]);

Route::name('js.')->group(function() {
    Route::get('dynamic.js', 'JsController@dynamic')->name('dynamic');
});

// Get authenticated user
Route::get('users/auth', function() {
    return response()->json(['user' => Auth::check() ? Auth::user() : false]);
});
Route::group(['Middleware'=>['auth','admin']],function()
{
    Route::get('/home/projet/ajout', 'ProjetController@index')->name("ViewProject");//return add view
});
//project route
Route::post('/home/projet/ajout/add', 'Projetcontroller@Store');//Store project to the DB
Route::get('/home/projet/update', 'Projetcontroller@updateView')->name('EditProject');//Return all database project
Route::get('/home/projet/{id}/edit', 'Projetcontroller@view');//Return project update view
Route::get('/home/projet','ProjetController@testtest')->name("ViewAllProjet");
Route::get('/home/projet/{id}/d', 'Projetcontroller@destroy');//destroy and delete the project
Route::patch('/home/projet/{id}', 'Projetcontroller@update');//pactch and update the project
Route::patch('/home/projet/emp/{id}', 'Projetcontroller@updateEmp');//pactch and update the project
Route::get('/t','ProjetController@test');//Ajax request return all project
Route::get('/tt','indexController@test');//Ajax request return all  project
Route::get('/nv','indexController@nv');//Ajax request return new project
Route::get('/enc','indexController@enc');//Ajax request return progressed project
Route::get('/ter','indexController@ter');//Ajax request return  project
Route::get('/tt/{id}','ProjetController@test2');//Ajax request return project by id
Route::get('/home/projet/{id}/orderaffect', 'Projetcontroller@affect');//pactch and update the project
Route::get('/home/projet/Nouveaux Projets', 'ProjetController@newpoject')->name("ViewNewProject");//List all new project
Route::get('/home/projet/ProjetsEncours', 'ProjetController@startedproject')->name("ViewStartedProject");//List all project in progress
Route::get('/home/projet/{id}/confirm','ProjetController@confirm');//Work confirm
Route::get('/home/satistique/projectstat', 'ProjetController@stat')->name('stat');//Return project stat view
Route::get('/home/emp/{empname}/travail','ProjetController@order')->name('order');//Affect work order
//categorie Route
Route::get('/home/cat/add', 'CatController@add')->name("AddCat"); //Return add new categorie view
Route::post('/home/cat/add/{id}', 'CatController@Store');//Store new categorie
Route::get('/home/cat' , 'CatController@view')->name("ViewCat");//return the view tro list all categorie of the database
Route::get('/home/cat/{id}/edit', 'CatController@edit');//Return the view to edit a spesific catégorie
Route::patch('/home/cat/{id}', 'catcontroller@update');//Patch and update a categorie
Route::get('/home/cat/{id}/d', 'catcontroller@destroy');//Delete and destroy a categorie
//empRoute
Route::get('/home/emp/add','EmployeController@viewAdd')->name("AddEmpolye");//Return the view to add and employee
//Route::get('/testtest','EmployeController@testtest');
Route::post('/emp/store','EmployeController@store')->name("StoreUser");//Store an employee the the database
//msg
Route::get('/messagerie','MessageController@index')->name("Viewmsg");
Route::get('/messagerie/new','MessageController@NewMsg')->name("Newmsg");
Route::post('/messagerie/store', 'Messagecontroller@Store');
Route::get('/messagerie/user/store', 'Messagecontroller@Storeuser');
Route::get('/messagerie/{id}/d', 'Messagecontroller@destroy');
Route::get('/messagerie/{email}/{sujet}/repondre', 'Messagecontroller@replyView');
Route::post('/messagerie/reply/send/', 'Messagecontroller@send');

Route::get('/test', "Messagecontroller@map");
Route::get('/index',function () {
    return view('home.index');
})->name('index');
Route::get('/index/map',function () {
    return view('home.map');
})->name("map");
Route::get('/home', function(){
    return redirect(route("admin.dashboard"));
})->name("forum");
//stat route
Route::get('/index/map/new',function () {
    return view('home.mapNew');
})->name("newProject");
Route::get('/index/map/progress',function () {
    return view('home.mapProg');
})->name("progresedProject");
Route::get('/index/map/terminer',function () {
    return view('home.mapTer');
})->name("TerminerProject");
Route::get('/index/contact',function () {
    return view('home.contact');
})->name("ContactUs");
Route::get('/index/presentation',function () {
    return view('home.Apropo');
})->name("Apropo");


//sms verification

Route::post('/index/contact/verif/verification','MessageController@VerifView')->name("VeV");
