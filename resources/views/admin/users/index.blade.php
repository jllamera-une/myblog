@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Users</h1>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                    <th></th>
                </thead>
                <tbody>
                    
                    <!-- create a variable for the loop-->
                    @foreach ($users as $user)

                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>
                            <a href="{{ route('posts.show', $user->id) }}" class="btn btn-default btn-sm">View</a>
                            <form action="{{ route('posts.destroy', [$user->id]) }}" method="post">
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