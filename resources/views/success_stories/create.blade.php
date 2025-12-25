@extends('layouts.app')
@section('title','Add Story')

@section('content')
<h1 class="h3 mb-3">Add Success Story</h1>
<div class="text-muted mb-3">Member: {{ $member->name }}</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('members.success-stories.store', $member) }}" class="row g-3">
            @csrf
            <div class="col-12">
                <label class="form-label">Title *</label>
                <input class="form-control" name="title" value="{{ old('title') }}" required>
                @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-12">
                <label class="form-label">Story *</label>
                <textarea class="form-control" name="story" rows="6" required>{{ old('story') }}</textarea>
                @error('story') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-outline-secondary" href="{{ route('members.success-stories.index', $member) }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection