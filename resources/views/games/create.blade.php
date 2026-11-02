
@extends('layouts.app')

@section('title', 'Add Video Game')

@section('content')

    <h2>Add Video Game</h2>

    <form method="POST" action="{{ route('games.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title">Game Title</label>
            <input
                type="text"
                name="title"
                id="title"
                class="form-control"
                value="{{ old('title') }}"
            >
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="developer">Developer</label>
            <select name="developer" id="developer" class="form-control">
                <option value="">Select Developer</option>
                @foreach ([
                    'Mojang Studios',
                    'Riot Games',
                    'HoYoverse',
                    'Moonton',
                    'ConcernedApe',
                    'Rockstar Games'
                ] as $dev)
                    <option value="{{ $dev }}" @selected(old('developer') === $dev)>
                        {{ $dev }}
                    </option>
                @endforeach
            </select>
            @error('developer')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="genre_id">Genre</label>
            <select name="genre_id" id="genre_id" class="form-control">
                <option value="">Select Genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}"
                        @selected(old('genre_id') == $genre->id)>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="year">Year</label>
            <input
                type="number"
                name="year"
                id="year"
                class="form-control"
                value="{{ old('year') }}"
            >
            @error('year')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Add Game
        </button>

        <a href="{{ route('games.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>

@endsection
