<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleDescription extends Model
{
    protected $table = 'article_description';
    protected $primaryKey = 'article_id';
}
