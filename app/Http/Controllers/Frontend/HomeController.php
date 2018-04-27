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

//        $this->title = $page->description()->meta_title;
//        $this->metaDescription = $page->description()->meta_description;

        return view('client.pages.home');
    }
}