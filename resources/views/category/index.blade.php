@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Category</div>

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
                        <a class="btn btn-light" href="{{ route('category.create') }}">Add Category</a>
                        <a class="btn btn-primary" href="{{route('home')}}">Back to Product List</a>
                    </div>

                    <br>

                    <div class="row-fluid">
                        <table class="table-primary table-bordered" style="width:80%">
                            <tr class="thead-dark">
                                <td class="p-3">Category ID</td>
                                <td class="p-3" style="width:20%">Category Name</td>
                                <td class="p-3">Description</td>
                                <td class="bg-light table-borderless"></td>
                                <td class="bg-light"></td>
                            </tr>
                            @foreach($category as $row)
                            <tr>
                                <td class="text-center">{{ $row['id'] }}</td>
                                <td class="text-center">{{ $row['name'] }}</td>
                                <td class="text-center">{{ $row['description'] }}</td>
                                <td class="text-center bg-light p-3"><a class="btn btn-outline-primary" href=" {{action('CategoryController@edit', $row['id'])}} "><i class="fas fa-edit"></i></a></td>
                                <td class="text-center bg-light p-3">
                                    <form action="{{action('CategoryController@destroy',$row['id'])}}" method="post" class="delete_form">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class='btn btn-outline-danger' type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
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
