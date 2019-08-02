@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Edit Category</h3>
                <br>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action=" {{action('CategoryController@update', $id)}} " method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Category Name" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" class="form-control" placeholder="Enter Description" value="{{$category->description}}">
                    </div>
                    <div class="form-group">
                        <a href="{{route('category.index')}}" class="btn btn-secondary">Back</a>
                        <input type="submit" value="Edit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection