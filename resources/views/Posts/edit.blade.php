@extends('layouts.app')

@section('title', '| Edit Blog Post')

@section('content')
    <div class="row">
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('put')
            <h1>Edit Post</h1>

            <div class="col-md-8">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control input-lg" value="{{ $post->title }}" required> 
                </div>
                <div class="form-group">
                    <label for="content" class="form-spacing-top">Content</label>
                    <input type="text" name="content" id="content" class="form-control" value="{{ $post->content }}" required></textarea>
                </div>
            </div>

            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Created At:</dt>
                        <dd>{{ date('j M Y H:i A', strtotime($post->created_at)) }}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Last Updated:</dt>
                        <dd>{{ date('j M Y H:i A',strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('posts.show', [$post->id]) }}" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success btn-block">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
@endsection