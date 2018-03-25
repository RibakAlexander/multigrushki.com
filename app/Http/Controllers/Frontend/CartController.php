<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 14.02.2018
 * Time: 20:46
 */

namespace App\Http\Controllers\Frontend;

use App\Page;

class CartController extends FrontendController
{
    public function index($id){
        $page = Page::select(['id', 'title', 'text'])->where('id', "=", $id)->first();
        // $category = Category::getCategory($id);
        $this->title = $category->description()->meta_title;
        $this->metaDescription = $category->description()->meta_description;
    }
}