@extends('layouts.admin')


@section('title')
Product List
@stop



@section('styles')
<style>

.title-create {
    margin-bottom: 5px;
}
</style>
@stop

@section('page_title')
Product List
@stop


@section('content')
<div class="row">
    <table class="table table-bordered">
      

            <a class="btn btn-success title-create" href="{{route('products.create')}}">Them moi</a>
       
        <thead>
            <tr>
                <th>STT</th>
                <th> Image </th>
                <th>Product name </th>
                <th>Category</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td><a href=""><img src="{{$product->image}}" alt=""></a> </td>
                    <td><a href="{{ route('products.show', $product->id ) }}">{{ $product->name }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
<script>

</script>

@endsection