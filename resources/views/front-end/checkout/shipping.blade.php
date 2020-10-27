@extends('front-end.master')
@section('body')
<div class="row px-4" style="margin: 0px;">
    <div class="row">
        <div class="row">
            <div class="col-lg-12 well text-center text-bold text-success" style="margin: 10px 0px;">
                <h3>Dear Mr/Ms {{Session::get('customername')}}.you have to give us product shipping info to your valueable order. if your billing info or shipping info same then just press into save shipping info button</h3>
            </div>
        </div>
    </div>

	<div class="col-lg-6 well col-md-offset-3">
        <br>
        <h3 class='text-center text-warning py-5'>shipping info goes here...........</h3>
        <br>
		{{Form::open(['route'=>'new-shipping','method'=>'POST'])}}
		<div class="form-group">
			<input type="text" value="{{$customer->first_name.''.$customer->lastname}}" name="full_name" class="form-control w-25" placeholder="Full Name">
		</div>
		
		<div class="form-group">
			<input type="email" value="{{$customer->email}}" name="email" class="form-control" placeholder="Email@fjkjf">
		</div>
		
		<div class="form-group">
		 <input type="tel" value="{{$customer->phone}}" name="phone" class="form-control" placeholder="phone">
		</div>
		<div class="form-group">
			<textarea name="address" class="form-control" placeholder="address">{{$customer->address}}</textarea>
		</div>
		<div class="form-group">
			<input type="submit" name="btn" class="btn btn-info btn-lg" value="save order info">
		</div>
		{{Form::close()}}
	</div>


</div>
@endsection