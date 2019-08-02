@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Edit Product</h3>
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

                <form action=" {{action('ProductController@update', $id)}} " method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Product Name" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" placeholder="Enter Product Price" value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="stock" class="form-control" placeholder="Enter Stock" value="{{$product->stock}}">
                    </div>
                    <div class="form-group">
                        <select name="category_name" class="form-control">
                            @foreach($category as $row)
                            <option value="{{$row['name']}}">{{$row['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <a href="{{route('home')}}" class="btn btn-secondary">Back</a>
                        <input type="submit" value="Edit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection