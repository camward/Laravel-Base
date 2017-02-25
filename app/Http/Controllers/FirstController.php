<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use DB;
use App\Article;

class FirstController extends Controller
{
    public function show(){
        echo "controller work show";

        /*DB::insert('INSERT INTO `articles` (`name`, `text`, `img`) VALUES (?,?,?)', [
            'Статья 4',
            'Текст статьи 4',
            'img4.jpg'
        ]);*/

        // DB::update('UPDATE `articles` SET `name` = ? WHERE `id` = ?', ["TEST2", 2]);

        // DB::delete('DELETE FROM `articles` WHERE `id` = ?', [2]);

        // DB::statement('DROP TABLE `articles`');

        // $art = DB::select("SELECT * From `articles`");
        // $art = DB::select("SELECT * From `articles` WHERE `id` = ?", [2]);
        // $art = DB::select("SELECT * From `articles` WHERE `id` = :id", ['id'=>2]);

        // $art = DB::table('articles')->get();


        // Получение данных через модель
        // $art = Article::all();
        $art = Article::where('id', '>', 1)->get(); // конструктор запросов

        foreach ($art as $item){
            echo "<br />".$item->name;
        }

        dump($art);

        // Сохранения данных в БД
        /*$article = new Article();
        $article->name = 'New name';
        $article->text = 'New text';
        $article->img = 'New img';
        $article->save();*/

        // Обновление данных
        /*$article = Article::find(2); // обновит запись с id = 2
        $article->name = 'New name 2';
        $article->text = 'New text 2';
        $article->img = 'New img 2';
        $article->save();*/

        // Сохранения данных в БД через create
        /*Article::create([
            'name'=>'New name 3',
            'text'=>'New text 3',
            'img'=>'New img 3'
        ]);*/

        // удаляем запись с id = 2
        // Article::destroy(2);

        // удаляем несколько записей
        // Article::destroy([1,2,3]);
    }

    public function hide(){
        echo "controller work hide";
    }

    /*protected $request;
    public function __construct(Request $request){
        $this->request = $request;
    }*/

    public function contact(Request $request){
        echo "<br /><br /><br />";
        echo "<pre>";
        print_r($request->all());
        echo "</pre>";

        /*$request->all(); // покажет все параметры
        $request->only('name', 'email'); // покажет определенные параметры
        $request->except('password'); // покажет все параметры, кроме указанных*/

        $view = view('template.contact', ['title' => 'Contact'])->render();
        return (new Response($view))->header('Content-Type', 'newType');
    }
}