@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="well">
            @if($message=Session::get('message'));         
            <h2 class="text-center text-success">{{$message}}</h2>
            @endif
            {{ Form::open(['route'=>'new-brand', 'method'=>'post', 'class'=>'form-horizontal']) }}
            <div class="form-group">
                <label for="" class="control-label col-md-3">Brand Name</label>
                <input type="text" name="brand_name" class='col-md-9 form-control'>
                <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' '}}</span>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">Brand Description</label>
                <textarea name="brand_description" class="form-control col-md-9"></textarea>
                <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : ' '}}</span>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">Publication Status</label>
                <span class="text-danger"></span>
                <div class='col-md-9'>
                    <label><input type="radio" name="publication_status"  value="1">published</label>
                    <label><input type="radio" name="publication_status"  value="0"/>unpublished</label>
                    {{ $errors->has('publication_status') ? $errors->first('publication_status') : ' '}}
                </div>
            </div>
            <input type="submit" name="btn" class='btn btn-lg btn-info' value="save brand info">
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection