<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 14.02.2018
 * Time: 20:46
 */

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Page;
use App\Models\Product;

class MainController extends Controller
{
    public function index(){
        $product = Product::find(28);
        $categoryID = 2300; // $_SESSION['category_id']

        //$category = $product->categories()->wherePivot('category_id', $categoryID);
//        $category = $category->description();
        $products = Manufacturer::find(5)->products;

        //$desc = $category->description()->where('language_id', '=', '1')->first();
        dd($products);
        $this->title = $page->description()->meta_title;
        $this->metaDescription = $page->description()->meta_description;
    }
}