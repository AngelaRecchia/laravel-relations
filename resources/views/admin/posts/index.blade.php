@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="container">

        @if (session('updated'))
            <div class="alert alert-success">
                {{ session('updated') }}
            </div>
        @endif

        @if (session('deleted'))
            <div class="alert alert-warning">
                {{ session('deleted') }}
            </div>
        @endif

        @if(count($posts))
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Text</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                    <tr >
                        <th>{{ $post->title }}</th>
                        <td>
                            @if($post->cat_id)
                            <a href="{{route('admin.categories.show', $post->Category->slug)}}" class="cat">{{$post->Category->name}}</a>
                            @endif
                        </td>
                        <td class="colText">{{ $post->content }}</td>
                        <td class="d-flex justify-content-around">
                            <a href="{{ route('admin.posts.show', $post->slug) }}" class="button">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}"class="button">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }} " method="post" class="d-inline-block delete-post-form" id="delForm">
                                @csrf
                                @method('DELETE')
                                <div class="button" onclick="document.getElementById('delForm').submit();">
                                    <i class="far fa-trash-alt"></i>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div>No posts to show</div>            
        @endif

    </div>
@endsection
