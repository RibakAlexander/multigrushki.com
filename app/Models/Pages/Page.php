<?php

namespace App\Models\Pages;

use App\Models\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected static $description = "PageDescription";

    public function description(){
        return $this->hasMany('App\PageDescription', 'page_id');
    }

    public static function getAllPages(){
        $pages = DB::table('pages')
            ->join('page_description', "pages.page_id", '=', 'page_description.page_id')
            ->where('pages.status', 1)
            ->select()
            ->get();
        //SELECT * FROM `mi_pages` LEFT JOIN mi_page_description ON(mi_pages.page_id = mi_page_description.page_id) WHERE mi_pages.status = 1
        return $pages;
    }

}
