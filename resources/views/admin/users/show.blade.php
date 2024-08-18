@extends('admin.layouts.admin')

@section('title', '| View User')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $user->name }}</h1>
            <p class="lead">{{ $user->email }}</p>
            <p class="lead">{{ $user->role }}</p> 
            <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>

        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('j M Y H:i A', strtotime($user->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('j M Y H:i A',strtotime($user->updated_at)) }}</dd>
                </dl>
                <hr>
                {{-- <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        <form action="{{ route('users.destroy', [$post->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm"/>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection