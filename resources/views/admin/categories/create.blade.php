@extends('layouts.admin')


@section('title')
Category
@stop


@section('page_title')
Create new category
@stop


@section('content')
<form action="">
    <div class="form-group">
        <label for="">Category name</label>
        <input type="text" class="form-control">
    </div>
    <div class="form-group">
            <input type="button" id="btn" class="btn btn-success" value="Submit">
    </div>
        <div id="demo">hello</div>
</form>
@endsection
@section('scripts')
<script>

</script>

@endsection