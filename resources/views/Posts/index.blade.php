@extends('layouts.app')

@section('title', "| All Posts")

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>   
        
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary">Create New Post</a>
        </div>
        <hr>
    </div> <!-- end of row -->

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