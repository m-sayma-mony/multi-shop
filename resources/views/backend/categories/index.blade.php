@extends('backend.master')

@section('title', 'Manage Category')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="bg-light rounded h-100 p-4">
                    <h2 class="mb-4 text-center">Manage Categories</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->price}}</td>
                                    <td>{{$category->image}}</td>
                                    <td>{{$category->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td>
                                        <a href="{{route('admin.category.edit', ['id' => $category->id])}}">
                                            <i class="fa fa-edit"></i>
                                        </a> 
                                        <a href="{{route('admin.category.delete', ['id' => $category->id])}}" class="ms-2">
                                            <i class="fa fa-trash"></i>
                                        </a>   
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
