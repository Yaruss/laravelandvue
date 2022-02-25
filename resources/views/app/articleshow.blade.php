@extends('layouts.app')
@section('content')
    <div id="app">
        <div class="row mt-5">
            <div class="col-12 p-3">
                <img src="{{$article->img}}" class="border rounded mx-auto d-block" alt="...">
                <h5 class="mt-5">{{$article->title}}</h5>
                <p>
                    <tag-component></tag-component>
                </p>
                <p class="card-text">{{$article->body}}</p>
                <p>Опубликованно:  <i>{{$article->createdAtForHumans()}}</i></p>
                <state-component></state-component>
            </div>
        </div>
        <hr>
        <div class="row">
            <comment-form-component></comment-form-component>
            <comment-component></comment-component>
        </div>
    </div>

@endsection
@section('vue')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
