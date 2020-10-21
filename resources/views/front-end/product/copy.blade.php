// return $request->all();
        // return $Products;
        // $cartitem = Cart::instance('mytest')->add($request->id,$Products->product_name,$Products->product_price, intval($request->qty),[
        //     'image'=>$Products->product_image]);
        // Cart::store($user->id))->content();

        $cartitem = Cart::add($request->id,$Products->product_name,$Products->product_price, intval($request->qty),[
            'image'=>$Products->product_image]);
        //print_r($cartitem->uniqueId);
       
    // $cartitems=  Cart::add  ([
    //         'id'=>$request->id,
    //         'name'=>$Products->product_name,
    //         'price'=>$Products->product_price,
    //         'quantity'=>$request->qty,
        
    //         'options'=>[
    //             'image'=>$Products->product_image,
    //         ]
    //     ]);
        

        return redirect('/cart/show');
    }

    public function showcart(){
        return Cart::content();
        die();
        // return $cartproducts;
        //  die();
                 // $cartproducts = Cart::instance('mytest')->content();

        // return ($cartproducts);
        return view('front-end.cart.show-cart');
    }