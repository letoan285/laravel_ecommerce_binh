@extends('layouts.admin')


@section('title')
Category
@stop


@section('page_title')
Create new Profile
@stop

@section('content')
<form action="{{route('profiles.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">User ID</label>
        <select name="user_id" id="" class="form-control">
            @foreach ($users as $user)
         <option value="{{ $user->id }}">{{ $user->name }}</option>
                
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="">address</label>
        <input type="text" class="form-control" name="address" placeholder="VD: danh-muc-1">
    </div>

    <div class="form-group">
        <label for="">Avatar</label>
        <input type="file" class="form-control" name="avatar" > 
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <textarea class="form-control" cols="30" rows="10" name="description"></textarea>
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