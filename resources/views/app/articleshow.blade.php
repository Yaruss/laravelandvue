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
            <form action="">
                <div class="mb-3">
                    <label for="commentSubject" class="form-label">Тема комментария</label>
                    <input type="text" class="form-control" id="commentSubject">
                </div>
                <div class="mb-3">
                    <label for="commentBody" class="form-label">Комментарий</label>
                    <textarea class="form-control" id="commentBody" rows="3"></textarea>
                </div>
                <button class="btn btn-success" type="submit">Отправить</button>
            </form>
            <comment-component></comment-component>
        </div>
    </div>

@endsection
@section('vue')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
