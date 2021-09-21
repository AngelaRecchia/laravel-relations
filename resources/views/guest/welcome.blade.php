@extends('layouts.app')
@section('title', 'Boolpress')
@section('content')
<div class="container">
    <div class="posts-cont row row-cols-3 ">
            @foreach ($posts as $post)

                <div class="col mb-4">
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
