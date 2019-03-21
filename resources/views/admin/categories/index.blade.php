@extends('layouts.admin')


@section('title')
Category List
@stop



@section('styles')
<style>

.title-create {
    margin-bottom: 5px;
}
</style>
@stop

@section('page_title')
Category List
@stop


@section('content')
<div class="row">
    <table class="table table-bordered">
      

            <a class="btn btn-success title-create" href="{{route('categories.create')}}">Them moi</a>
       
        <thead>
            <tr>
                <th>STT</th>
                <th>Category name </th>
                <th>Slug</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cate)
                
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td><a href="{{route('categories.show', $cate->id)}}">{{$cate->name }} </a></td>
                <td>{{$cate->slug }}</td>
                <td>{{$cate->status == 1 ? 'Hien thi' : 'Khong hien thi' }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{route('categories.destroy', $cate->id)}}"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('categories.destroy', $cate->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                    
                    </form>
                </td>
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