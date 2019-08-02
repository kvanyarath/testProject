@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div>
                <h3>Add Category</h3>
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
                @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
                @endif

                <form method="post" action="{{url('category')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" class="form-control" placeholder="Enter Description">
                    </div>
                    <div>
                        <a href="{{route('category.index')}}" class="btn btn-secondary">Back</a>
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection