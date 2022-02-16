@extends('layouts.app')

@section('content')
    @foreach ($tags as $tag)
        <a href="{{ route('article.tag', $tag->label) }}" class="btn btn-primary">{{$tag->label}}</a>
    @endforeach
    <a href="{{ route('article') }}" class="btn btn-danger"><i class="bi bi-x-square-fill"></i></a>
    <div class="row mt-5">
        @foreach($articles as $article)
            <div class="col-3 pb-3">
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
                                <a href="{{ route('article.tag', $tag->label) }}" class="badge bg-danger">{{$tag->label}}</a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mx-auto"> {{ $articles->links('vendor.pagination.bootstrap-4') }} </div>
@endsection
