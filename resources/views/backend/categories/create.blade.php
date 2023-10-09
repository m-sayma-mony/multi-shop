@extends('backend.master')

@section('title', 'Add Category')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1 mt-4">
                <div class="bg-light rounded h-100 p-4">
                    <h2 class="mb-4 text-center">Add Category</h2>
                    <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                        @include('notify')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">

                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description">

                            @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price">

                            @error('price')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">

                            @error('image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection