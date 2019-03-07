@extends('layouts.admin')


@section('title')
Product
@stop
@section('styles')
<style>
.product-image {
    border: 1px solid grey;
    min-height: 200px
}
.product-detail {
    border: 1px solid coral;
    min-height: 200px
}
.mb-5 {
    margin-bottom: 5px;
}
</style>
@stop



@section('page_title')
Product {{$product->name}}
@stop

@section('content')
<div class="row mb-5">

    <span class="pull-right"><a class="btn btn-primary" href="{{route('products.edit', $product->id)}}">Edit product</a></span>
</div>
<div class="row">
    <div class="col-md-4 product-image">
        <div>
            <img src="" alt="">
        </div>
        <div>
            <h3>Product name: {{$product->name}}</h3>

        </div>
    </div>
    <div class="col-md-8 product-detail">
        <h3></h3>
        <p>{{$product->description}}</p>
        <strong>{{$product->status}}</strong>
        <p>{{$product->category_id}}</p>
    </div>
</div>

@endsection
@section('scripts')
<script>

</script>

@endsection