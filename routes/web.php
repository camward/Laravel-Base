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
    return view('template.index', ['title' => 'Новый шаблон']); // передача параметров в шаблон (1-й вариант)
    // return view('template.site')->with('title', 'Новый шаблон'); // передача параметров в шаблон (2-й вариант)
    // return view('template.site')->withTitle('Новый шаблон'); // передача параметров в шаблон (3-й вариант)

    // использование with, если значений будет несколько
    /*$view = view('template.site');
    $view->with('title1', 'Новый шаблон1');
    $view->with('title2', 'Новый шаблон2');
    return $view;*/
});

Route::get('/link', ['uses' => 'FirstController@show', 'as'=>'home']);

Route::get('/page', function () {
    // echo "<pre>";
    // print_r($_ENV);
    // echo "</pre>";
    // echo config('app.locale'); // название_файла_конфига.настройка
    // echo Config::get('app.locale');
    echo env('APP_ENV'); // название ключа
});

// для комбинированных запросов
Route::match(['get', 'post', 'put'], '/match', function () {
    echo "match";
});

// для всех типов запросов
Route::any('/any', function () {
    echo "any";
});

// использование параметров
Route::get('/params/{id}', function ($id = null) { // {id} - параметр обязательно должен быть. {id?} - параметр НЕобязателен
    echo "id = " . $id;
})->where('id', '[0-9]+'); // регулярное выражение для фильтрации параметров
// если переменных несколько, то передавать через массив: where(['id'=>'[0-9]+', 'category_name'=>'[A-Za-z]+'])

// группы маршрутов
Route::group(['prefix'=>'admin'], function() {
    // страницы будут доступны по адресу /admin/page/...

    Route::get('/page/create', function () {
        return redirect()->route('article', array('id'=>25));
    });
    Route::get('/page/update', function () {
        echo "update";
    });
    Route::get('/page/view', function () {
        echo "view";
    });
    Route::get('/page/delete', function () {
        echo "delete";
    });
});

// сформируем ссылку на route, к которой можно будет обращаться по redirect()->route('article', array('id'=>25))
Route::get('article/{id}', ['as'=>'article', function ($id){
    echo '<br /><br /><br />'.$id;
    return view('template.article', ['title' => 'Новый шаблон']);
}]);

// использование методов контроллера
Route::get('/abouts', 'FirstController@show');

// ссылка на route
Route::get('/about/{id}', ['uses' => 'FirstController@hide', 'as'=>'about', 'middleware'=>'mymiddle']);

// обращение к методам REST
Route::resource('/pages', 'CoreResource');