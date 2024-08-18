@extends('admin.layouts.admin')

@section('title', '| Edit User')

@section('content')
    <div class="row">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('put')
            <h1>Edit User</h1>

            <div class="col-md-8">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control input-lg" value="{{ $user->name }}" required> 
                </div>
                <div class="form-group">
                    <label for="email" class="form-spacing-top">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" required></textarea>
                </div>
                <div class="form-group">
                    <label for="email" class="form-spacing-top">Password</label>
                    <input type="text" name="email" id="email" class="form-control" value=""></textarea>
                </div>
                <div class="form-group">
                    <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role">
                            <option value="{{ $user->role }}">User</option>
                            <option value="{{ $user->role }}">Author</option>
                            <option value="{{ $user->role }}">Admin</option>
                        </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="well">
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <a href="{{ route('users.index', [$user->id]) }}" class="btn btn-danger btn-block">Cancel</a>
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