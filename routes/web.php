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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

Route::prefix('cart')->name('cart.')->group(function(){
    Route::get('/', 'CartController@index')->name('index');
    Route::post('add', 'CartController@add')->name('add');
    Route::get('remove/{slug}', 'CartController@remove')->name('remove');
    Route::get('cancel', 'CartController@cancel')->name('cancel');
});

Route::prefix('checkout')->name('checkout.')->group(function(){
    Route::get('/', 'CheckoutController@index')->name('index');
});

Route::group(['middleware' => ['auth']], function() {

    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function() {

        // Route::prefix('stores')->name('stores.')->group(function() {
    
        //     Route::get('/', 'StoreController@index')->name('index');
        //     Route::get('/create', 'StoreController@create')->name('create');
        //     Route::post('/store', 'StoreController@store')->name('store');
        //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        //     Route::post('/update/{store}', 'StoreController@update')->name('update');
        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
    
        // });
    
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');

        Route::post('photos/remove/', 'ProductPhotoController@removePhoto')->name('photo.remove');
       
    });
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/model', function() {
    //$products = \App\Product::all();
    
    //Active Record

    //$user = new \App\User();
    //$user = \App\User::find(1);
    //$user->name = "Usuário Teste Editado...";
    //$user->save();
    //\App\User::all() - retorna todos os usuários
    //\App\User::find(3) - retorna o usuário com base no id
    //\App\User::where('name', 'Alberta Kilback Sr.')->first()
    //\App\User::paginate(10) - paginar dados com laravel

    //Mass Assigmente = Atribuição em Massa

    // $user = \App\User::create([
    //     'name' => 'Eduardo Stertz',
    //     'email' => 'email@teste.com',
    //     'senha' => bcrypt('12345566')
    //]);

    //Mass Update
    //$user = \App\User::find(1);
    //$user->update([
        //'name' => 'Atualizando com Mass Update'  
    //]);

    //Como eu faria para pegar a loja de um usuário
    //$user = \App\User::find(41);

    //dd($user->store()->count());

    //Pegar os produtos de uma loja?
    //$loja = \App\Store::find(1);
    //return $loja->products; $loja->products()->where('id', 1)->get();
    

    //Pegar as lojas de uma categoria de uma loja?
    //$categoria = \App\Category::find(1);
    //$categoria->products;

    //Criar uma loja para um usuário

    // $user = \App\User::find(10);
    // $store = $user->store()->create([
    //     'name' => 'Loja Teste',
    //     'description' => 'Loja Teste de produtos de informática',
    //     'mobile_phone' => 'XX-XXXX-XXXX',
    //     'phone' => 'XX-XXXX-XXXX',
    //     'slug' => 'loja-teste'

    // ]);

    //Criar um produto para uma loja
    // $store = \App\Store::find(41);
    // $product = $store->products()->create([
    //     'name' => 'Notebook Dell',
    //     'description' => 'CORE I5 10GB',
    //     'body' =>'Qualquer coisa...',
    //     'price' => 2999.90,
    //     'slug' => 'notebook-dell',
    // ]);

    // dd($product);

    //Criar uma categoria

    // $category = \App\Category::create([
    //     'name' => 'Games',
    //     'description' => null,
    //     'slug' => 'games'
    // ]);

    // $category = \App\Category::create([
    //     'name' => 'Notebooks',
    //     'description' => null,
    //     'slug' => 'notebooks'
    // ]);

    // return \App\Category::all();

    //Adicionar um produto para uma categoria ou vice-versa
    
    //$product = \App\Product::find(49);

    //dd($product->categories()->sync([1,2]));


    //return $product; 
});