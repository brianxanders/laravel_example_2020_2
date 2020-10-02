@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Boek/Aanmaken</h1>


    <nav class="nav">
        <ul class="nav nav-tabs">
            <li>
                <a class="nav-link" href="{{route('books.index')}}">Index</a>
            </li>
            <li>
                <a class="nav-link active" href="{{route('books.create')}}">Create</a>
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

    <form method="POST" action="{{route('books.store')}}">
        @csrf

        <div class="form-group">
            <label for="title">
                Boek naam
            </label>
            <input type="text" class="form-control" name="title"
                   value="{{old('title')}}" id="title"
                   aria-describedby="booknameHelp" placeholder="Vul Boek naam in">

        </div>

        <div class="form-group">
            <label for="description">
                Omschrijving
            </label>
            <textarea class="form-control" name="description" id="description" rows="3">{{old('description')}}</textarea>
        </div>

        <div class="form-group">
            <label for="isbn">
                isbn
            </label>
            <input type="text" class="form-control" name="isbn"
                   value="{{old('isbn')}}" id="isbn"
                   aria-describedby="bookIsbnHelp" placeholder="Vul isbn nummer in">

        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if(old('category_id')== $category->id)
                            selected
                        @endif
                    >{{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-primary">Voeg Boek toe</button>

    </form>

@endsection
