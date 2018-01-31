<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    //protected $table = 'mi_articles';
    protected $primaryKey = 'article_id';
    protected $fillable = ['title', 'alias', 'desc', 'text'];

    public function description(){
        return $this->hasMany('App\ArticleDescription', 'article_id');
    }

    public static function getArticles(){
        return DB::table('articles')
            ->join('article_description', "articles.article_id", '=', 'article_description.article_id')
            ->where('articles.status', 1)
            ->select()
            ->get();

    }

}
