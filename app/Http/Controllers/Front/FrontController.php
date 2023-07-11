<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\User;

use App\Models\Product;
use App\Models\ProductMultipleImage;


use DB;

class FrontController extends Controller
{
    
    public function Index()
    {
        $result['category_data'] = Category::latest()->get();
        $result['sub_category_data'] = SubCategory::latest()->get();

        $result['slider_data'] = Slider::latest()->get();
        $result['brand_data'] = Brand::latest()->get();

        $result['new_arrival_data'] = Product::latest()->get();


        
        return view('front.index', $result);
    }

    public function Shop()
    {
        $result['category_data'] = Category::latest()->get();
        $result['product_data'] = Product::latest()->get();

        return view('front.shop', $result);
    }

    public function ProductDetail($id)
    {
        $result['category_data'] = Category::latest()->get();
        $result['product_data'] = Product::where('id', $id)->get();
        $result['product_multiple_img'] = ProductMultipleImage::where('product_id', $id)->get();

        return view('front.product-detail', $result);
    }

    
    public function Profile()
    {
        $result['category_data'] = Category::latest()->get();

        $userData = session()->get('UserData');
        $result['user'] = User::where('id', $userData->id)->first();
        return view('front.profile', $result);
    }


    public function Cart()
    {
        $result['category_data'] = Category::latest()->get();
        $result['new_arrival_data'] = Product::latest()->get();

        // $userData = session()->get('UserData');
        // $result['user'] = User::where('id', $userData->id)->first();
        return view('front.cart', $result);
    }

    









    // Static Pages 
    public function About()
    {
        $result['category_data'] = Category::latest()->get();
        return view('front.about', $result);
    }

    public function Contact()
    {
        $result['category_data'] = Category::latest()->get();
        return view('front.contact', $result);
    }

    

}
