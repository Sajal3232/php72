@extends('front-end.master')
@section('body')
<div class="row px-4" style="margin: 0px;">
	<div class="col-lg-12 well text-center cext-bold" style="margin: 10px 0px;">
		<h3>you have to give us product payment method</h3>
	</div>
	<div class="row">
        <div class="col-lg-6 well col-md-offset-2">
            {{Form::open(['route'=>'new-order','method'=>'post'])}}
                <table class="table table-bordered">
                    <tr>
                        <th>cash on delivery</th>
                        <td><input type="radio" name="payment_type" value="cash">Cash On Delivery</td>
                    </tr>
                    <tr>
                        <th>Paypal</th>
                        <td><input type="radio" name="payment_type" value="paypal">Paypal</td>
                    </tr>
                    <tr>
                        <th>Bkas</th>
                        <td><input type="radio" name="payment_type" value="bkas">Bkas</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input type="submit" name="btn" value="confirm order" value="confirm order"></td>
                    </tr>
                </table>
                {{Form::close()}}
        </div>
    </div>


</div>
@endsection