<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.add-brand');
    }

    public function savebrand(Request $request){
        $this->validate($request, [
            'brand_name'=>'required|regex:/^[\pL\s\-]+$/u|max:15|min:2',
            'brand_description'=>'required',
            'publication_status'=>'required'
        ]);
        $brand=new Brand();
       $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
       $brand->publication_status = $request->publication_status;
       $brand->save();

       return redirect('/brand/add')->with('message', 'brand info add successfully');
    }

    // public function brandsproduct(){
    //         $newproducts=Brand::where('publication_status', 1)->get();
    //         return view('front-end.home.home', ['newproducts'=>$newproducts]);       

    // }
}
