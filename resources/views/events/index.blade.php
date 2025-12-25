@extends('layouts.app')
@section('title','Events')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Events</h1>
    <a class="btn btn-primary" href="{{ route('events.create') }}">+ Add Event</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-striped mb-0 align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th style="width:180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr class="clickable-row"
                    data-href="{{ route('events.show', $event) }}"
                    style="cursor:pointer;">
                    <td>{{ $event->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d H:i') }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($event->description, 80) }}</td>

                    <td class="text-end" onclick="event.stopPropagation();">
                        <div class="d-flex justify-content-end gap-2">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('events.edit', $event) }}">Edit</a>

                            <form method="POST" action="{{ route('events.destroy', $event) }}"
                                onsubmit="return confirm('Delete this event?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4">No events found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">
        {{ $events->links() }}
    </div>
</div>
@endsection