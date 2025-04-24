@extends('layouts.main')

@section('title', 'Create Post')

@section('content')
<div class="container">
    <h1 class="mb-4">Create Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title">Title</label>
            <input name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="body">Body</label>
            <textarea name="body" id="body" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="enabled">Enabled</label>
            <select name="enabled" id="enabled" class="form-control" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
