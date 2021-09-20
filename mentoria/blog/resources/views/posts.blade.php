@extends('layout')

@section('banner')
<h1> El Super Blog </h1>
@endsection


@section('content')

    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <article>
                <h1>
                    <a href="/post/<?= $post->slug?>">
                        {{ $post->title }}
                    </a>
                </h1>
                <p>
                    by<a href="#"> Juan Perez</a> in
                    <a href="/category/{{$post->category->slug}}">
                    {{$post->category->name}}
                </a>    
                <p><?= $post->resumen?></p>
            </article>
        @endforeach
    @else
        I don't have any posts!
    @endif
       
@endsection