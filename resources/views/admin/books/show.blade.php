@extends('layouts.layout')

@section('content')


    <h1 class="mt-5">Boeken</h1>

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('books.index') }}">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('books.create') }}">Create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('books.show',
                        ['book' => $book->id]) }}">Boek Details</a>
            </li>
        </ul>
    </nav>
    <div class="card-header">
        Boek
    </div>
    <div class="card-body">
        <h2 class="card-title">{{ $book->title }}</h2>
        <p class="card-text">{{ $book->description }}</p>
        <p class="card-text">{{ $book->isbn }}</p>
        <p class="card-text">{{ $book->category->name }}</p>
    </div>

@endsection
