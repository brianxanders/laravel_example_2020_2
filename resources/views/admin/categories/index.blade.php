@extends('layouts.layout')

@section('content')
    <h1 class="m-5">Categories</h1>
    @if(session('message'))
        <div class="alert alert-success text-center">
            {{session('message')}}
        </div>
    @endif
    @if(session('wrong'))
        <div class="alert alert-danger text-center">
            {{session('wrong')}}
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li>
                <a class="nav-link active" href="{{route('categories.index')}}">Index</a>
            </li>
            <li>
                <a class="nav-link" href="{{route('categories.create')}}">Create</a>
            </li>
        </ul>
    </nav>

    <table class="table . table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Details</th>
            <th scope="col">Aanpassen</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as  $category)
            <tr>
                <td scope="row">{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td><a href="{{route('categories.show',['category' => $category->id])}}">Details</a> </td>
                <td><a href="{{route('categories.edit',['category' => $category->id])}}">Aanpassen</a> </td>
                <td><a href="{{route('categories.delete',['category' => $category->id])}}">Delete</a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

