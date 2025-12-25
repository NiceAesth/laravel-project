@extends('layouts.app')

@section('title', 'All Success Stories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">All Success Stories</h1>
</div>

<div class="card">
    <div class="list-group list-group-flush">
        @forelse($stories as $story)
        <div class="list-group-item">
            <div class="d-flex justify-content-between align-items-start gap-3">
                <div class="flex-grow-1">
                    <a class="fw-semibold text-decoration-none"
                        href="{{ route('members.success-stories.show', [$story->member, $story]) }}">
                        {{ $story->title }}
                    </a>

                    <div class="text-muted small">
                        by
                        <a href="{{ route('members.show', $story->member) }}" class="text-decoration-none">
                            {{ $story->member->name }}
                        </a>
                        · {{ $story->created_at?->format('Y-m-d') }}
                    </div>

                    <div class="mt-2">
                        {{ \Illuminate\Support\Str::limit($story->story, 220) }}
                    </div>
                </div>

                <a class="btn btn-sm btn-outline-secondary"
                    href="{{ route('members.success-stories.index', $story->member) }}">
                    Member Stories
                </a>
            </div>
        </div>
        @empty
        <div class="list-group-item text-center py-4 text-muted">
            No success stories yet.
        </div>
        @endforelse
    </div>

    <div class="card-body">
        {{ $stories->links() }}
    </div>
</div>
@endsection