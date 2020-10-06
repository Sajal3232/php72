<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-category');
    }


public function savecategoryinfo(Request $request){
    
    $category=new Category();
    $category->category_name = $request->category_name;
    $category->category_description = $request->category_description;
    $category->publication_status = $request->publication_status;
    $category->save();
   
    return redirect('/category/add')->with('message', 'category info add successfully');

}

public function manage(){
   $categories= Category::all();
    return view('admin.category.manage-category', ['categories'=>$categories]);
}
 public function unpublishedcategoryinfo($id){
     $category=Category::find($id);
     $category->publication_status =0;
     $category->save();
     return redirect('/category/manage')->with('message', 'category info unpublished successfully');


 }
 public function publishedcategoryinfo($id){
    $category=Category::find($id);
    $category->publication_status =1;
    $category->save();
    return redirect('/category/manage')->with('message', 'category info published successfully');


}
public function editcategoryinfo($id){
    $category=Category::find($id);
    return view('admin.category.edit-category', ['category'=>$category]);

}
public function updatecategoryinfo(Request $request){
    $category=Category::find($request->category_id);
    $category->category_name = $request->category_name;
    $category->category_description = $request->category_description;
    $category->publication_status = $request->publication_status;
    $category->save();

    return redirect('/category/manage')->with('message', 'category info updated successfully');

}
public function deletecategoryinfo($id){
    $category=Category::find($id);
     $category->delete();
     return redirect('/category/manage')->with('message', 'category info delete successfully');


}


}
