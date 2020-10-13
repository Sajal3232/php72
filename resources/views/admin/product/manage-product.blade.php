@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="well">
                <h2 id="xyz" class="text-center text-success"></h2>
            <div class="table-responsive">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">SI No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">product Name</th>
                    <th scope="col">product image</th>
                    <th scope="col">product price</th>
                    <th scope="col">product quantity</th>
                    <th scope="col">Publication Status</th>
                    <th scope="col">action</th>                  
                    </tr>
                </thead>
                @php ($i=1)
                @foreach ($products as $product)
                <tbody>
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$product->category_name}}</td>
                        <td>{{$product->brand_name}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>
                            <img src="{{asset($product->product_image)}}" alt="" height="70" width="70">
                        </td>
                        <td>{{$product->product_price}}</td>
                        <td>{{$product->product_quantity}}</td>
                        <td>{{$product->publication_status}}</td>
                        <td>demo</td>
                        
                    </tr>
                </tbody>
                @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection