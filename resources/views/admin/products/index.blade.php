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
                <th>Status</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td><a href=""><img src="{{$product->image}}" alt=""></a> </td>
                    <td><a href="">{{$product->name}}</a> </td>
                    <td><a href="">{{$product->status}}</a> </td>
                    <td><a href="">{{$product->category_id}}</a> </td>
                    <td>
                        @foreach ( ($product->tags)    as $tag)
                        
                            <a class="badge badge-primary" href="./tags/{{$tag->id}}/products">{{$tag->name}}</a>

                        @endforeach
                    </td>
                    <td>
                    <a class="btn btn-sm btn-info" href="{{$product->id}}"><i class="fa fa-pencil"></i></a>
          
                        <a onclick="confirmDeleteProduct('{{route('products.destroy', $product->id)}}')" href="javascript:;" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

      
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
<script>

    function confirmDeleteProduct(url) {

        bootbox.confirm({
            message: "Ban chac chan xoa chu ?",
            buttons: {
                confirm: {
                    label: 'Có',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Không',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if(result) {
                    window.location.href = url;
                }
            }
        });

    }

    



</script>

@endsection

{{-- {{route('products.destroy', $product->id)}} --}}