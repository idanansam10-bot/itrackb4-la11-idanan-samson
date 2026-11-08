@extends('layouts.app')

@section('title', 'Video Game Details')

@section('content')

    <h1>{{ $item['title'] }}</h1>

    <p><strong>ID:</strong> {{ $item['id'] }}</p>
    <p><strong>Game:</strong> {{ $item['title'] }}</p>
    <p><strong>Developer:</strong> {{ $item['developer'] }}</p>
    <p><strong>Genre:</strong> {{ $item->genre->name }}</p>
    <p><strong>Year:</strong> {{ $item['year'] }}</p>

    <p>Created by: Samson Idanan Jr.</p>

    <a href="{{ route('games.index') }}" class="btn btn-primary">
        Back to Game List
    </a>

@endsection