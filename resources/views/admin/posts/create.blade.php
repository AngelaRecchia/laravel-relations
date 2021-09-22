@extends('layouts.app')
@section('title', 'Create a new post')
@section('content')

<div class="container">
    
   <h2 class="my-3">Write a new post</h2>

    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{old('title')}}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <select name="cat_id" id="category" class="form-control">
                <option value="">-- Select a category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ ucfirst($category->name) }} </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="text" placeholder="Write your post here" cols="30" rows="10">{{old('content')}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror         
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary px-5 my-3">Publish</button>
        </div>
        
    </form>
</div>
@endsection
