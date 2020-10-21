<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use DB;

class Productcontroller extends Controller
{
    public function index(){
        $categories=Category::where('publication_status', 1)->get();
       $brands= Brand::where('publication_status', 1)->get();
        return view('admin.product.add-product',[
            'categories'=>$categories,
            'brands'=>$brands,
        ]);
    }

    protected function productValidateInfo($request){
        $this->validate($request,[
            'category_id'=>'required',
             'brand_id'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
            'product_quantity'=>'required',
            'short_description'=>'required',
            'product_image'=>'required',
            'publication_status'=>'required',

        ]); 
    }

    protected function productImageUpload($request){
        $productimage=$request->file('product_image');
        $filetype=$productimage->getClientOriginalExtension();
        $imagename=$request->product_name.'.'.$filetype;
        // $imagename=$productimage->getClientOriginalName(); or
        $directory='product-images/';
        //$productimage->move($directory,$imagename);
        $imageurl=$directory.$imagename;
        Image::make($productimage)->save($imageurl);
        return $imageurl;
    }

    protected function saveProductBasicInfo($request,$imageurl){
        $products=new Product();

        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->product_name = $request->product_name;
        $products->product_price = $request->product_price;
        $products->product_quantity = $request->product_quantity;
        $products->short_description = $request->short_description;
        $products->long_description = $request->long_description;
        $products->product_image= $imageurl; 
        $products->publication_status = $request->publication_status;
        $products->save();
    }

    public function saveproduct(Request $request){
        $this->productvalidateinfo($request);
        
        $imageurl=$this->productImageUpload($request);
        $this->saveProductBasicInfo($request,$imageurl);
        return redirect('/product/add')->with('message','product save successfully');
    }

    public function manageproduct(){
        $products=DB::table('products')
                    ->join('categories','products.category_id','=','categories.id')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->select('products.*','categories.category_name','brands.brand_name')
                    ->get();


        return view('admin.product.manage-product',['products'=>$products]);
    }

    public function editproduct($id){
       $products= Product::find($id);
      $categories= Category::where('publication_status', 1)->get();
      $brands= Brand::where('publication_status', 1)->get();
        return view('admin.product.edit-product',[
            'product'=>$products,
            'categories'=>$categories,
            'brands'=>$brands
        ]);
    }
     

    public function productbasicupdateinfo($products,$request,$imageurl=null){
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->product_name = $request->product_name;
        $products->product_price = $request->product_price;
        $products->product_quantity = $request->product_quantity;
        $products->short_description = $request->short_description;
        if($imageurl){
            $products->product_image = $imageurl;
        }
        $products->long_description = $request->long_description;
        $products->publication_status = $request->publication_status;
        $products->save();
    }
    public function updateproduct(Request $request){
    //    $productimage= $_FILES['product_image'];
    //    print_r($productimage);

    $productimage=$request->file('product_image');
    $products=Product::find($request->product_id);

    if($productimage){
        unlink($products->product_image);

        $imageurl=$this->productImageUpload($request);
       $this->productbasicupdateinfo($products,$request,$imageurl);
        
    }else{

        $this->productbasicupdateinfo($products,$request);
    }
    return redirect('/product/manage')->with('message', 'product update successfully');

 }
}
