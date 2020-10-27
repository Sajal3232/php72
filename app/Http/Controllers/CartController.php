<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Session;
class CartController extends Controller
{
    private $user_id = 'sajol32';
    public function addtocart(Request $request){
        $Products= Product::find($request->id);

       // return $request->all();
        // return $Products;
        Cart::restore($this->user_id);
        Cart::add($request->id,$Products->product_name,$Products->product_price, intval($request->qty),[
            'image'=>$Products->product_image]);
        Cart::store($this->user_id);
        
    // $cartitems=  Cart::add  ([
    //         'id'=>$request->id,
    //         'name'=>$Products->product_name,
    //         'price'=>$Products->product_price,
    //         'quantity'=>$request->qty,
        
    //         'options'=>[
    //             'image'=>$Products->product_image,
    //         ]
    // //     ]);
        return redirect('/cart/show');

        }

    public function showcart(){
     Session()->flash('$this->user_id');
        Cart::restore($this->user_id);
        $cartproducts = Cart::content();
    
        // print_r($cartproducts);
        // die();
       // $cartproducts = Cart::content();
        // $cartproducts = Session::get('cartproducts');
        return view('front-end.cart.show-cart')->with('cartproducts',$cartproducts);
       
    }
    public function deletecartitem($uniqueid){
        Cart::restore($this->user_id);
        Cart::remove($uniqueid);
        Cart::store($this->user_id);
        //print_r($cartproducts);
        //die();
       // $cartproducts = Cart::content();
        // $cartproducts = Session::get('cartproducts');
    
        return redirect('/cart/show');
    }
    public function updatecartitem(Request $request){
           
        Cart::restore($this->user_id);
        $cartItem = Cart::get($request->uniqueId);
       
        if($cartItem) {
            $qty =  intval($request->qty) - $cartItem->quantity;
            Cart::add($cartItem->id,$cartItem->name,$cartItem->price, $qty,[
                'image'=>$cartItem->options['image']]);
            Cart::store($this->user_id);
        }
        return redirect('/cart/show');

    }
}
