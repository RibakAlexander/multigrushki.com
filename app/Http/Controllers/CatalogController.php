<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 14.02.2018
 * Time: 20:46
 */

namespace App\Http\Controllers;

use App\Category;

class CatalogController extends Controller
{
    public function category($id){
        $category = Category::select(['id', 'title', 'text'])->where('id', "=", $id)->first();
       // $category = Category::getCategory($id);
        $this->title = $category->description()->meta_title;
        $this->metaDescription = $category->description()->meta_description;
    }
    public function manufacturer(){

    }
    public function search(){

    }
    public function getProducts(){

    }
}