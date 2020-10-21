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
						
					</div>


					<div class="row">
						<div class="col-md-11 col-md-offset">
							<a href="{{route('checkout')}}" class='btn btn-success pull-right'>Check-Out</a>
							<a href="" class='btn btn-success'>Continue Shopping</a>
					</div>
							
					<!--Product Description-->
				</div>
			</div>
			<!--single-->
			
		</div>
@endsection