<?php

use Illuminate\Database\Seeder;
// use Article

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // 1 способ
        DB::insert('INSERT INTO `articles` (`name`, `text`, `img`) VALUES (?,?,?)', [
            'Статья 1',
            'Текст статьи 1',
            'img1.jpg'
        ]);

        // 2 способ
        DB::table('articles')->insert(
            [
                [
                    'name'=>'Статья 2',
                    'text'=>'Текст статьи 2',
                    'img'=>'img2.jpg'
                ]
            ]
        );

        // 3 способ (использование модели)
        /*Article::create([
            'name'=>'Статья 3',
            'text'=>'Текст статьи 3',
            'img'=>'img3.jpg'
        ]);*/
    }
}
