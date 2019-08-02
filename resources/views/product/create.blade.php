@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row" id="create-page-row">
            <div class="col-3"></div>
            <div class="col-6" id="create-page">
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
                    <div class="form-group">
                        <select name="category_name" class="form-control">
                            @foreach($category as $row)
                            <option value="{{$row['name']}}">{{$row['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <a href="{{route('home')}}" class="btn btn-secondary" id="back-btn">Back</a>
                        <input type="submit" class="btn btn-primary" id="submit-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection