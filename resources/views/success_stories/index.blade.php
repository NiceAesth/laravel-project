@extends('layouts.app')
@section('title', 'Success Stories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 mb-0">Success Stories</h1>
        <div class="text-muted">Member: {{ $member->name }}</div>
    </div>
    <div class="d-flex gap-2">
        <a class="btn btn-primary" href="{{ route('members.success-stories.create', $member) }}">+ Add Story</a>
        <a class="btn btn-outline-secondary" href="{{ route('members.index') }}">Back to Members</a>
    </div>
</div>

<div class="card">
    <div class="list-group list-group-flush">
        @forelse($stories as $story)
        <div class="list-group-item">
            <div class="d-flex justify-content-between align-items-start">
                <div class="me-3">
                    <div class="fw-semibold">{{ $story->title }}</div>
                    <div class="small text-muted">{{ $story->created_at?->format('Y-m-d') }}</div>
                    <div class="mt-2">{{ \Illuminate\Support\Str::limit($story->story, 250) }}</div>
                </div>
                <div class="d-flex gap-2">
                    <a class="btn btn-sm btn-outline-primary"
                        href="{{ route('members.success-stories.edit', [$member, $story]) }}">Edit</a>

                    <form method="POST"
                        action="{{ route('members.success-stories.destroy', [$member, $story]) }}"
                        onsubmit="return confirm('Delete this story?');">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="list-group-item text-center py-4 text-muted">No stories yet.</div>
        @endforelse
    </div>

    <div class="card-body">
        {{ $stories->links() }}
    </div>
</div>
@endsection