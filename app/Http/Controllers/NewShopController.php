<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

class NewShopController extends Controller
{
    public function index(){
        $newproducts=Product::where('publication_status', 1)
            ->orderBy('id','DESC')
            ->take(8)
            ->get();
            // $brands=Brand::where('publication_status', 1)->get();
            
        return view('front-end.home.home',[
            'newproducts'=>$newproducts,
            // 'brands'=>$brands
            ]);
    }

    public function categoryProduct($id){
       $categoriesproducts= Product::where('category_id', $id)
                ->where('publication_status',1)
                ->get();
        return view('front-end.category.category-content',[
            'categoriesproducts'=>$categoriesproducts
        ]);

    }

    public function productdetails($id){
        $product=Product::find($id);
        return view('front-end.product.product-details',['product'=>$product]);
    }

    public function mailUs(){
        return view('front-end.mail-us.mailus-content');
    }


}
