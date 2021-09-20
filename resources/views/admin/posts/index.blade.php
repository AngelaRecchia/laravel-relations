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
                        <th scope="col" class="col-2">Title</th>
                        <th scope="col" class="col-8">Text</th>
                        <th class="col-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th>{{ $post->title }}</th>
                        <td id="colText">{{ $post->content }}</td>
                        <td class="text-right d-flex justify-content-around">
                            <a href="{{ route('admin.posts.show', $post->slug) }}" id="btnShow" class="button">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}"id="btnEdit" class="button">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }} " method="post" class="d-inline-block delete-post-form" id="delForm">
                                @csrf
                                @method('DELETE')
                                <div id="btnDel" class="button" onclick="document.getElementById('delForm').submit();">
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
