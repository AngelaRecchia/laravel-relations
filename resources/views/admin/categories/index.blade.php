@extends('layouts.app')
@section('title', 'Categories')
@section('content')
<div class="container">
    <h2>All posts by category</h2>
    <div class="row row-cols-3">
    @foreach($cats as $cat)
        <div class="col">
            <h4 class="my-3"><a href="{{route('admin.categories.show', $cat->slug)}}" class="cat big">{{ $cat->name }}</a></h4>
                @forelse($cat->posts as $post)
                    <h6><a href="{{ route('admin.posts.show', $post->slug)}} ">{{ $post->title}}</a></h4>
                @empty
                    <p>No posts for this category.</p>
                @endforelse
        </div>
    @endforeach
    </div>
</div>
@endsection
