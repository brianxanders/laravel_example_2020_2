@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Categories/verwijderen</h1>


    <nav class="nav">
        <ul class="nav nav-tabs">
            <li>
                <a class="nav-link" href="{{route('categories.index')}}">Index</a>
            </li>
            <li>
                <a class="nav-link" href="{{route('categories.create')}}">Create</a>
            </li>
            <li>
                <a class="nav-link active">Delete</a>
            </li>
        </ul>
    </nav>

    @if($errors->any())
        <div class="alert alert-danger">
            <u>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </u>
        </div>
    @endif

    <form method="POST" action="{{route('categories.destroy', ['category' => $category->id])}}">
        @method('DELETE')
        @csrf

        <div class="form-group">
            <label for="name">
                Categorie naam
            </label>
            <p class="text-danger border border-dark">{{$category->name}}</p>
            <input type="hidden" class="form-control" name="name"
                   aria-describedby="categorienameHelp" value="{{$category->name}}">
        </div>
        <button type="submit"  class="btn-danger">Delete</button>

    </form>

@endsection
