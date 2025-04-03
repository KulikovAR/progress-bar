@extends('layouts.app')

@section('content')
    <h1>Retro Progress Bars</h1>

    <div class="add-form">
        <form action="{{ route('progress-bars.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter progress bar name" required>
            <button type="submit">Add Progress Bar</button>
        </form>
    </div>

    @foreach($progressBars as $progressBar)
        <div class="progress-bar">
            <h3>{{ $progressBar->name }}</h3>
            <div class="progress-container">
                <div class="progress" style="width: {{ $progressBar->value }}%"></div>
            </div>
            <form action="{{ route('progress-bars.update', $progressBar) }}" method="POST" style="display: inline;">
                @csrf
                @method('PUT')
                <input type="hidden" name="value" value="{{ min(100, $progressBar->value + 10) }}">
                <button type="submit" {{ $progressBar->value >= 100 ? 'disabled' : '' }}>+10</button>
            </form>
            <form action="{{ route('progress-bars.update', $progressBar) }}" method="POST" style="display: inline;">
                @csrf
                @method('PUT')
                <input type="hidden" name="value" value="{{ max(0, $progressBar->value - 10) }}">
                <button type="submit" {{ $progressBar->value <= 0 ? 'disabled' : '' }}>-10</button>
            </form>
            <form action="{{ route('progress-bars.destroy', $progressBar) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
@endsection 