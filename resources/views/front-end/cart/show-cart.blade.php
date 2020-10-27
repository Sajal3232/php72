@extends('front-end.master')
@section('body')
<!--banner-->
<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>ADD TO CART</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<!--single-->
			<div class="single-wl3">
				<div class="container">
					<div class="row">
						<div class="col-md-11 col-md-offset">
							<h2 class="text-center text-success">my shopping cart</h2>
							<hr>
							
							<table class="table table-bordered">

							<tr>
									<th>SI NO</th>
									<th>NAME</th>
									<th>IMAGE</th>
									<th>PRICE</th>
									<th>QUANTITY</th>
									<th>TOTAL PRICE</th>
									 <th>ACTION</th>
								</tr>
								@php ($i=1)
								@php ($sum=0)
								@foreach($cartproducts as $cartproduct)
								
								<tr>
									<td>{{$i++}}</td>
									<td>{{$cartproduct->name}}</td>
									<td>
									 <img style="width: 50px; height:50px;" src="{{asset($cartproduct->options['image'])}}" />
									</td>
									<td>{{$cartproduct->price}}</td>
									<td>
										{{Form::open(['route'=>'update-cart-quantity','method'=>'post'])}}
										<input type="number" name="qty" value="{{$cartproduct->quantity}}" min="1">
										<input type="hidden" name="uniqueId" value="{{$cartproduct->getuniqueId()}}" min="1">
										<input type="submit" value="Update" name="btn">
										{{Form::close()}}
									</td>
									<td>{{$result=$cartproduct->price * $cartproduct->quantity}}</td>
									<td>
										<a href="{{ route('delete-cart-item',['uniqueid'=>$cartproduct->getuniqueId()])}}" class="btn btn-danger btn-sm">
											<span><i class="fab fa-trash"></i></span>
										</a>
									</td>
								</tr>
								<?php $sum=$sum+$result?>
								@endforeach
							</table >
							<hr>
							<table class="table table-bordered">
								<tr>
									<th>Item Total TK</th>
									<td>{{$sum}}</td>
								</tr>
								<tr>
									<th>Vat Total TK</th>
									<td>{{$vat=0}}</td>
								</tr>
								<tr>
									<th>Grand Total TK</th>
									<td>{{$orderTotal=$vat+$sum}}</td>
									<?php Session()->put('orderTotal',$orderTotal)?>
								</tr>
							</table>
								
							
						</div>
					</div>


					<div class="row">
						<div class="col-md-11 col-md-offset">
							@if(Session()->get('customerId') && Session()->get('shippingId'))
							<a href="{{route('checkout-payment')}}" class='btn btn-success pull-right'>Check-Out</a>
							@elseif(Session()->get('customerId')){
								<a href="{{route('checkout-shipping')}}" class='btn btn-success pull-right'>Check-Out</a>
							}
							@else{
								<a href="{{route('checkout')}}" class='btn btn-success pull-right'>Check-Out</a>
							}
							@endif
							<a href="{{route('/')}}" class='btn btn-success'>Continue Shopping</a>
							
					</div>
							
					<!--Product Description-->
				</div>
			</div>
			<!--single-->
			
		</div>
@endsection