@extends('layouts.admin')


@section('title')
Category
@stop


@section('page_title')
Create new category
@stop

@section('content')
<form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Category name</label>
        <input type="text" class="form-control" name="name">
        <span style="color:red">{{$errors->first('name')}}</span>
        
    </div>
    
    <div class="form-group">
        <label for="">Slug</label>
        <input type="text" class="form-control" name="slug" placeholder="VD: danh-muc-1">
        <span style="color:red">{{$errors->first('name')}}</span>
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" name="image" > 
    </div>

    <div class="form-group">
        <label for="">Parent ID</label>
        <select name="parent_id" id="" class="form-control">
                <option value="">Chon danh muc cha</option>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                
            @endforeach
        </select>
        <span style="color:red">{{$errors->first('name')}}</span>
    </div>

    <div class="form-group">
        <label for="">Status</label>
        <select name="status" id="" class="form-control">
            <option value="1">Hien Thi</option>
            <option value="0">Khong Hien Thi</option>
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