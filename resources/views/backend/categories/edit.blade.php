@extends('backend.master')

@section('title', 'Edit Category')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1 mt-4">
                <div class="bg-light rounded h-100 p-4">
                    <h2 class="mb-4 text-center">Edit Category</h2>
                    <form action="{{route('admin.category.update', ['id' => $categories->id])}}" method="POST" enctype="multipart/form-data">
                        @include('notify')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$categories->name}}">

                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" value="{{$categories->description}}">

                            @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" value="{{$categories->price}}">

                            @error('price')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label><br>
                            <img src="{{asset('/')}}{{$categories->image}}" alt="" width="50" class="mb-2">
                            <input type="file" class="form-control" name="image" value="{{$categories->image}}">

                            @error('image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection