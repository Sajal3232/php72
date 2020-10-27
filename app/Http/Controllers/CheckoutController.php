<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\shipping;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Cart;


class CheckoutController extends Controller

{
    private $user_id = 'sajol32';

    public function index(){
        return view('front-end.checkout.checkout-content');
    }

    public function customersignup(Request $request){
        $this->validate($request,[
            'email'=>'email|unique:customers,email'
        ]);
       $customer= new customer();
       $customer->first_name=$request->first_name;
       $customer->last_name=$request->last_name;
       $customer->email=$request->email;
       $customer->password=bcrypt($request->password);
       $customer->phone=$request->phone;
       $customer->address=$request->address;
       $customer->save();

       $customerId=$customer->id;
       Session()->put('customerId',$customerId);
       Session()->put('customername',$customer->first_name.' '.$customer->last_name);
       $data= $customer->toArray();
      Mail::send('front-end.mails.confirmation-mails', $data, function($message) use($data){
          $message->to($data['email']);
          $message->subject('confirmation mail');
      });

      return redirect('/checkout/shipping');

    }

    public function shippingForm(){
        $customer=customer::find(Session()->get('customerId'));
        return view('front-end.checkout.shipping',['customer'=>$customer]);
    }

    public function saveshippinginfo(Request $request){
        $shipping=new shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->save();

        Session()->put('shippingId',$shipping->id);
        return redirect('/checkout/payment');

        

    }

    public function paymentForm(){
        return view('front-end.checkout.payment');
    }
    public function newOrder(Request $request){

        $paymentType=$request->payment_type;
        
        if($paymentType=='cash'){
                $order=new Order();
                $order->customer_id =Session()->get('customerId');
                $order->shipping_id =Session()->get('shippingId');
                $order->customer_id =Session()->get('customerId');
                $order->order_total =Session()->get('orderTotal');
                $order->save();


                $payment= new payment();
                $payment->order_id=$order->id;
                $payment->payment_type=$paymentType;
                $payment->save();

                Cart::restore($this->user_id);
                $cartproducts = Cart::content();            
                //  echo '<pre>';
                //  print_r($cartproducts);
                //  die();

                $orderDetail=new OrderDetail();
                foreach($cartproducts as $cartproduct){
                $orderDetail->order_id=$order->id;
                $orderDetail->product_id=$cartproduct->id;
                 $orderDetail->product_name=$cartproduct->name;
                 $orderDetail->product_price=$cartproduct->price;
                 $orderDetail->product_quantity=$cartproduct->quantity;
                 $orderDetail->save();
                }
                Cart::destroy($this->user_id);

                return redirect('/complete/order');

        }
        elseif($paymentType=='paypal'){

        }
        elseif($paymentType=='bkas'){
            
        }
    }
    public function completeOrder(){
        return redirect('/');
    }

    ///////customer login

    public function customerlogincheck(Request $request){
    $customer=Customer::where('email',$request->email_login)->first();
    
    if (password_verify($request->password_login, $customer->password)) {

        Session()->put('customerId',$customer->id);
        Session()->put('customername',$customer->first_name.' '.$customer->last_name);

        return redirect('/checkout/shipping');

    } else {
        return redirect('/cart/checkout')->with('message','please enter your correct password');
     }

    }


    public function customerlogoutfromheader(){
        Session()->forget('customerId');
        Session()->forget('customername');
        return redirect('/');
    }

    public function customerloginfromheader(){
        return view('front-end.customer.customer-login');
    }



    /////new-customer-login-front
    public function newcustomerloginfront(Request $request){
        $customer=Customer::where('email',$request->email_login)->first();
             

        if($customer && $request->email_login==$customer->email){


            if (password_verify($request->password_login, $customer->password)) {

                Session()->put('customerId',$customer->id);
                Session()->put('customername',$customer->first_name.' '.$customer->last_name);
        
                return redirect('/checkout/new-customer-login')->with('message','successfully login');
        
            } else {
                return redirect('/checkout/new-customer-login')->with('message','please enter your correct password');
             }


        }else{
            return redirect('/checkout/new-customer-login')->with('messagereg','please register first'); 
        }
        

    }
}
