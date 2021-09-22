@extends('layouts.app')
@section('title', $cat->name)
@section('content')
<div class="container">
    <h2>{{$cat->name}}</h2>
    <div class="posts-cont row row-cols-3 ">
            @foreach ($posts as $post)

                <div class="col mb-4">
                    <a href="{{route('admin.posts.show', $post->slug)}}"></a>
                    <div class="card">  
                        <h4 class="card-header">
                            {{ ucfirst($post->title) }}
                        </h4>   
                        <div class="card-body">
                            <p class="card-text post-text"> {{ substr($post->content, 0, 160) . '...' }}</p>
                        </div>  
                    </div> 
                </div>

            @endforeach
        
    </div>
    
</div>
@endsection
