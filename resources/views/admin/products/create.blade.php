@extends('layouts.admin')


@section('title')
Product
@stop


@section('page_title')
Create new product
@stop

@section('content')
<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Category name</label>
        <input type="text" class="form-control" name="name">
    </div>
    
    <div class="form-group">
        <label for="">Slug</label>
        <input type="text" class="form-control" name="slug" placeholder="VD: danh-muc-1">
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" name="image" > 
    </div>

    <div class="form-group">
        <label for="">Parent ID</label>
        <select name="category_id" id="" class="form-control">
                <option value="">Chon danh muc cha</option>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select name="status" id="" class="form-control">
            <option value="1">Hien Thi</option>
            <option value="0">Khong Hien Thi</option>
        </select>
    </div>

    <div class="form-group">
            <label for="">Tags</label>
            <select name="tag[]" id="" class="form-control" multiple>
                @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
                    
                @endforeach
                
            </select>
        </div>

    <div class="form-group">
            <input type="submit" id="btn" class="btn btn-success" value="Submit">
    </div>
</form>
@endsection
@section('scripts')
<script>

</script>

@endsection