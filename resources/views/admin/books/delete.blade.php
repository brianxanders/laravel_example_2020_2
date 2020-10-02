@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Boek/Verwijderen</h1>


    <nav class="nav">
        <ul class="nav nav-tabs">
            <li>
                <a class="nav-link" href="{{route('books.index')}}">Index</a>
            </li>
            <li>
                <a class="nav-link" href="{{route('books.create')}}">Create</a>
            </li>
            <li>
                <a class="nav-link active">Verwijderen</a>
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

    <form method="POST" action="{{route('books.destroy', ['book' => $book->id])}}">
        @method('DELETE')
        @csrf

        <div class="form-group">
            <label for="title">
                Titel boek
            </label>
            <input type="text" class="form-control" name="title" id="title"
                   aria-describedby="BookTitleHelp" value="{{$book->title}}" disabled="disabled">
        </div>

        <div class="form-group">
            <label for="description">
                Omschrijving
            </label>
            <textarea name="description" id="description" rows="3"
                      class="form-control" disabled="disabled">{{$book->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="isbn">
                Category
            </label>
            <input type="text" name="isbn" id="isbn" class="form-control" disabled="disabled" value="{{$book->isbn}}">
        </div>

        <div class="form-group">
            <label for="category_id">
                Category
            </label>
            <input type="text" name="category_id" id="category_id" class="form-control" disabled="disabled" value="{{$book->category->name}}">
        </div>

        <button type="submit" class="btn-danger">Verwijderen</button>

    </form>

@endsection
