@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div>
                <h3>Add Product</h3>
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

                <form method="post" action="{{url('product')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Product Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" placeholder="Enter Product Price">
                    </div>
                    <div class="form-group">
                        <input type="text" name="stock" class="form-control" placeholder="Enter Stock">
                    </div>
                    <!-- <div class="form-group">
                        <select name="category_name" class="form-control">
                            <option value=""></option>
                        </select>
                    </div> -->
                    <div>
                        <a href="{{route('home')}}" class="btn btn-secondary">Back</a>
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection