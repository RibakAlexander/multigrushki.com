<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 14.02.2018
 * Time: 20:46
 */

namespace App\Http\Controllers;

use App\Page;

class CartController extends Controller
{
    public function index($id){
        $page = Page::select(['id', 'title', 'text'])->where('id', "=", $id)->first();
        // $category = Category::getCategory($id);
        $this->title = $category->description()->meta_title;
        $this->metaDescription = $category->description()->meta_description;
    }
}