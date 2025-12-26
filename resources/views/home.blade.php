@extends('layouts.app')

@section('title', 'Home')

@section('content')
<h1 class="h3 mb-3">Women in FinTech Platform</h1>

<div class="row g-3">
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header fw-bold">Upcoming Events</div>
            <div class="card-body">
                @forelse($upcomingEvents as $event)
                <div class="mb-3">
                    <a href="{{ route('events.show', $event) }}"
                        class="fw-semibold text-decoration-none">
                        {{ $event->name }}
                    </a>
                    <div class="text-muted small">
                        {{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d H:i') }}
                    </div>
                    <div class="small">{{ \Illuminate\Support\Str::limit($event->description, 120) }}</div>
                </div>
                @empty
                <div class="text-muted">No upcoming events.</div>
                @endforelse

                <a class="btn btn-sm btn-outline-primary" href="{{ route('events.index') }}">View all events</a>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card mb-3">
            <div class="card-header fw-bold">Newest Members</div>
            <div class="card-body">
                @forelse($recentMembers as $m)
                <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                    <div>
                        <div class="fw-semibold">{{ $m->name }}</div>
                        <div class="text-muted small">{{ $m->profession }} @if($m->company) · {{ $m->company }} @endif</div>
                    </div>
                    <span class="badge rounded-pill px-2 py-1 {{ $m->status==='active' ? 'text-bg-success' : 'text-bg-secondary' }}">
                        <small>{{ $m->status }}</small>
                    </span>

                </div>
                @empty
                <div class="text-muted">No members yet.</div>
                @endforelse

                <a class="btn btn-sm btn-outline-primary mt-2" href="{{ route('members.index') }}">View all members</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header fw-bold">Recent Success Stories</div>
            <div class="card-body">
                @forelse($recentStories as $s)
                <div class="mb-3">
                    <a href="{{ route('members.success-stories.show', [$s->member, $s]) }}"
                        class="fw-semibold text-decoration-none">
                        {{ $s->title }}
                    </a>
                    <div class="text-muted small">
                        by
                        <a href="{{ route('members.show', $s->member) }}" class="text-decoration-none">
                            {{ $s->member->name }}
                        </a>
                    </div>
                    <div class="small">{{ \Illuminate\Support\Str::limit($s->story, 120) }}</div>
                </div>
                @empty
                <div class="text-muted">No success stories yet.</div>
                @endforelse

                <a class="btn btn-sm btn-outline-primary" href="{{ route('success-stories.index') }}">View all success stories</a>
            </div>
        </div>
    </div>
</div>
@endsection