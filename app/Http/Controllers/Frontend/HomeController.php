<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 14.02.2018
 * Time: 20:46
 */
namespace App\Http\Controllers\Frontend;
use App\Models\Categories\Category;
use App\Models\Manufacturers\Manufacturer;
use App\Models\Pages\Page;
use App\Models\Products\Product;

class HomeController extends FrontendController
{

    public function index(){
        $product = Product::find(28);
        $categoryID = 2300; // $_SESSION['category_id']
        //$category = $product->categories()->wherePivot('category_id', $categoryID);
//        $category = $category->description();
//        $manufaturer = Manufacturer::find(5);
//        $products = $manufaturer->products;
        $info = Manufacturer::with(['description' => function($query){
            $query->where('language_id', 1);
        }])->where('id', 5)->get();
        //$desc = $category->description()->where('language_id', '=', '1')->first();
        dd($info);
        $this->title = $page->description()->meta_title;
        $this->metaDescription = $page->description()->meta_description;
    }
}