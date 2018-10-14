@extends('layouts.app')

@section('content')
    <div class="card-deck">
        @foreach ($articles as $article)
            <div class="card mb-3" style="min-width: 20rem;">
                <img class="card-img-top" src="{{ $article->enclosure['url'] }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{ $article->title }}</h4>
                    <p class="card-text">{{ $article->description }}</p>
                    <a href="{{ $article->link }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
