@extends('layouts.admin')


@section('title')
Product
@stop


@section('content')
<div class="row">
    <div class="col-md-4 product-image">
        <div>
            <img src="" alt="">
        </div>
        <div>
        <h3>Tag name: {{$tag->name}}</h3>
        </div>
    </div>
    
</div>
<div class="row">
        <div class="col-md-12 product-detail">
                <h3>Danh sach product co tag la {{$tag->name}}</h3>
                    
        </div><hr>
       @foreach ($tag->products as $product)
           <div class="col-md-4">
                <div class="thumbnail">
                    <div class="caption">
                            <h3 class="card-title">{{$product->name}}</h3>
                    </div>
                    <div class="card-body">
                        <h3>{{$product->description}}</h3>
                        <h3>{{$product->price}}</h3>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-warning" href="{{ URL('/admin/products')}}">Come back</a>
                    </div>
                </div>
           </div>

       @endforeach
</div>

@endsection
