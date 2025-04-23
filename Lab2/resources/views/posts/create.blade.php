@extends('layouts.main')

@section('title', 'Create Post')

@section('content')
<div class="container">
    <h1>Create Post</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Body</label>
            <textarea name="body" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Enabled</label>
            <select name="enabled" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Writer</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Create</button>
    </form>
</div>
@endsection
