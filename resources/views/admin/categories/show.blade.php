@extends('layouts.layout')

@section('content')


    <h1 class="mt-5">Categorie</h1>

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.create') }}">Create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('categories.show',
                        ['category' => $category->id]) }}">Categorie Details</a>
            </li>
        </ul>
    </nav>
    <div class="card-header">
        Categorie
    </div>
    <div class="card-body">
        <h2 class="card-title">{{ $category->name }}</h2>
        <p class="card-text">Gemaakt: {{$category->created_at->format('d-m-Y')}}</p>
        <p class="card-text">Bijgewerkt: {{$category->updated_at->format('d-m-Y')}}</p>
    </div>

@endsection
