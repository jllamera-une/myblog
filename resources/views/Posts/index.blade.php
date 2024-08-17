@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Posts</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-outline-secondary">Create New Post</a>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th></th>
                </thead>
                <tbody>
                    
                    <!-- create a variable for the loop-->
                    @foreach ($posts as $post)

                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr($post->content, 0, 50) }}{{ strlen($post->content) > 50 ? "..." : "" }}</td>
                        <td>{{ date('j M Y', strtotime($post->created_at)) }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a>
                            <form action="{{ route('posts.destroy', [$post->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm"/>
                            </form>
                        </td>
                    </tr>
                        
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection