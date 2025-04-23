@extends('layouts.main')

@section('title', 'Edit Post')

@section('content')
<div class="container">
    <h1>Edit Post</h1>

    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" id="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" id="body" class="form-control" rows="5" required>{{ $post->body }}</textarea>
        </div>

        <div class="mb-3">
            <label for="enabled" class="form-label">Enabled</label>
            <select name="enabled" id="enabled" class="form-control">
                <option value="1" {{ $post->enabled ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$post->enabled ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Writer</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $post->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
