<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    // для возможности добавлять данные через Article::create
    // нужно определить поля, которые можно записывать
    protected $fillable = ['name', 'text', 'img'];

    // нет прав на запись в img через Article::create
    // protected $guarded = ['img'];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function roles(){
        return $this->belongsToMany('App\User', 'table_name', 'role_id', 'user_id');
    }
}
