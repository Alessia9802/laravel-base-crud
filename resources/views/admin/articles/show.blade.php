@extends('layouts.app')


@section('content')



<div class="container">
    <h1>{{$article->title}}</h1>
    <div>
        <p class="lead">
            {{ $article->body }}
        </p>

    </div>
</div>




@endsection