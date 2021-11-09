@extends("layout")
@section("content")

<article>
    <!-- <p> {{$post->body}} </p> -->

    <p> <a href="/category/{{$post->category->slug}}">
            {{$post->category->name}}
        </a>
    </p>

    <p><?= $post->resumen ?></p>
</article>
<a href="/">Go Back</a>
@endsection