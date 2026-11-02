
@extends('layouts.app')

@section('title', 'Video Games')

@section('content')
<h2>Video Game List</h2>

<p>
    <a href="{{ route('games.create') }}" class="btn btn-primary">
        Add Video Game
    </a>
</p>

<p>Genre: {{ $genre }} | Developer: {{ $developer }}</p>

<h5>Filter by Genre</h5>

<a href="{{ route('games.index', ['developer' => $developer]) }}">
    All Genres
</a>

@foreach ($genres as $item)
    <a href="{{ route('games.index', ['genre_id' => $item->id, 'developer' => $developer]) }}">
        {{ $item->name }}
    </a>
@endforeach

<h5>Filter by Developer</h5>

@php
    $developers = [
        'Mojang Studios',
        'Riot Games',
        'HoYoverse',
        'Moonton',
        'ConcernedApe',
        'Rockstar Games'
    ];
@endphp

<a href="{{ route('games.index', ['genre_id' => $genre]) }}">
    All Developers
</a>

@foreach ($developers as $dev)
    <a href="{{ route('games.index', ['genre_id' => $genre, 'developer' => $dev]) }}">
        {{ $dev }}
    </a>
@endforeach

<p>
    <a href="{{ route('games.index') }}">Clear Both Filters</a>
</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Title</th>
            <th>Developer</th>
            <th>Genre</th>
            <th>Year</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($games as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->id }}</td>
            <td>
                <a href="{{ route('games.show', $item->id) }}">
                    {{ $item->title }}
                </a>
            </td>
            <td>{{ $item->developer }}</td>
            <td>{{ $item->genre->name }}</td>
            <td>{{ $item->year }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6">
                No games are available.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
