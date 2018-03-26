<?php

namespace App\Models\Articles;

use App\Models\Model;

use Illuminate\Support\Facades\DB;

class Article extends Model
{
    protected $table = 'mi_articles';
    protected $fillable = ['title', 'alias', 'desc', 'text'];

    public function description(){
        return $this->hasMany(ArticleDescription::class, 'article_id');
    }

    public static function getArticles(){
        return DB::table('articles')
            ->join('article_description', "articles.article_id", '=', 'article_description.article_id')
            ->where('articles.status', 1)
            ->select()
            ->get();

    }

}
