@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Categories/Detais</h1>

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li>
                <a class="nav-link" href="{{route('categories.index')}}">Index</a>
            </li>
            <li>
                <a class="nav-link" href="{{route('categories.create')}}">Create</a>
            </li>
            <li>
                <a class="nav-link active">Detais</a>
            </li>
        </ul>
    </nav>

    <div class="card">
        <div class="card-header">
            categorie:
        </div>
        <div class="card-body">
            <h2 class="card-title border">Naam: {{$category->name}}</h2>
            <h2 class="card-text border float-left">Gemaakt: {{$category->created_at->format('d-m-Y')}}</h2>
            <h2 class="card-text border float-left">Bijgewerkt: {{$category->updated_at->format('d-m-Y')}}</h2>
        </div>
    </div>
@endsection
