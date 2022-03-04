@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        @foreach($articles as $article)
            <div class="col-6 pb-3">
                <div class="card">
                    <img src="{{$article->img}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->getBodyPreview()}}</p>
                        <p></p>
                        <a href="{{ route('article.slug', $article->slug) }}" class="btn btn-primary">Подробнее</a>
                        <div class="mt-3">
                            <span class="badge bg-primary">{{$article->state->likes}} <i class="bi bi-hand-thumbs-up"></i></span>
                            <span class="badge bg-danger">{{$article->state->views}} <i class="bi bi-eye "></i></span>
                        </div>
                        <div class="mt-4">
                            Теги:
                            @foreach ($article->tags as $tag)
                                <a href="" class="badge bg-danger">{{$tag->label}}</a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('vue')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
