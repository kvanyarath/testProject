@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3>Product List</h3></div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div>
                    @endif


                    <div class="row-fluid">
                        <a class="btn btn-light" href="{{ route('product.create') }}">Add Product</a>
                        <a class="btn btn-primary" href="{{route('category.index')}}">Category List</a>
                    </div>

                    <br>

                    <div class="row-fluid" id="product-list">
                        <div class="col-3"></div>
                        <div class="col-9">
                        <table class="table table-primary table-bordered">
                            <tr class="font-weight-bold">
                                <td class="p-3">Product ID</td>
                                <td class="p-3" style="width:20%">Name</td>
                                <td class="p-3">Price</td>
                                <td class="p-3">Stock</td>
                                <td class="p-3">Category</td>
                                <td class="bg-light table-borderless"></td>
                                <td class="bg-light"></td>
                            </tr>
                            @foreach($products as $row)
                            <tr>
                                <td class="text-center">{{ $row['id'] }}</td>
                                <td class="text-center">{{ $row['name'] }}</td>
                                <td class="text-center">{{ $row['price'] }}</td>
                                <td class="text-center">{{ $row['stock'] }}</td>
                                <td class="text-center">{{ $row['category_name'] }}</td>
                                <td class="text-center bg-light p-3"><a class="btn btn-outline-primary" href=" {{action('ProductController@edit', $row['id'])}} "><i class="fas fa-edit"></i></a></td>
                                <td class="text-center bg-light p-3">
                                    <form action="{{action('ProductController@destroy',$row['id'])}}" method="post" class="delete_form">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class='btn btn-outline-danger' type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        </div>
                        <!-- <div class="col-3"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.delete_form').on('submit',function(){
            if(confirm("Are you sure?"))
            {
                return true;
            }
            else
            {
                return false;
            }
        });
    });
</script>
@endsection
