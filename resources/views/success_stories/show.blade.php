@extends('layouts.app')

@section('title', 'Success Story')

@section('content')
<h1 class="h3 mb-2">{{ $story->title }}</h1>
<div class="text-muted mb-3">
    by {{ $member->name }} · {{ $story->created_at?->format('Y-m-d') }}
</div>

<div class="card">
    <div class="card-body">
        <p>{{ $story->story }}</p>

        <div class="d-flex gap-2 mt-4">
            <a href="{{ route('members.success-stories.edit', [$member, $story]) }}"
                class="btn btn-outline-primary">Edit</a>

            <a href="{{ url()->previous() !== url()->current()
            ? url()->previous()
            : route('members.success-stories.index', $member) }}"
                class="btn btn-outline-secondary">
                Back
            </a>

        </div>
    </div>
</div>
@endsection