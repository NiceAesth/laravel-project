@extends('layouts.app')

@section('title', 'Event Details')

@section('content')
<h1 class="h3 mb-3">{{ $event->name }}</h1>

<div class="card">
    <div class="card-body">
        <p class="mb-2">
            <strong>Date:</strong>
            {{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d H:i') }}
        </p>

        <p class="mb-4">
            <strong>Description:</strong><br>
            {{ $event->description }}
        </p>

        <div class="d-flex gap-2">
            <a href="{{ route('events.edit', $event) }}" class="btn btn-outline-primary">Edit</a>
            <a href="{{ url()->previous() !== url()->current()
            ? url()->previous()
            : route('events.index') }}"
                class="btn btn-outline-secondary">
                Back
            </a>
        </div>
    </div>
</div>
@endsection