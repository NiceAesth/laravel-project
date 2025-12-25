@extends('layouts.app')
@section('title','Add Event')

@section('content')
<h1 class="h3 mb-3">Add Event</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('events.store') }}" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label class="form-label">Name *</label>
                <input class="form-control" name="name" value="{{ old('name') }}" required>
                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Event Date *</label>
                <input type="datetime-local" class="form-control" name="event_date"
                    value="{{ old('event_date') }}" required>
                @error('event_date') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-12">
                <label class="form-label">Description *</label>
                <textarea class="form-control" name="description" rows="4" required>{{ old('description') }}</textarea>
                @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-outline-secondary" href="{{ route('events.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection