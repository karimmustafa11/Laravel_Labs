@extends('layouts.main')

@section('title', 'All Posts')

@section('content')
<div class="container">
    <h1 class="mb-4">All Posts</h1>

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">+ New Post</a>

    @forelse($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h4>{{ $post->title }}</h4>
                <p>{{ $post->body }}</p>
                <p><strong>Writer:</strong> {{ $post->user->name ?? 'Unknown' }}</p>
                <p><strong>Status:</strong> {{ $post->enabled ? 'Enabled' : 'Disabled' }}</p>

                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p>No posts found.</p>
    @endforelse

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection
