@extends("layout")

@section('banner')
    <h1>El super Blog</h1>
@endsection

@section("content")
<!-- probando instruccion if -->
    @if(count($posts) > 0)
    
        @foreach($posts as $post)
        <!-- ?php foreach($posts as $post): ?> -->
            <article>
                <h1> 
                     <!-- modifica $post->slug> -->
                     <a href="/post/<?= $post->id?>">
                        <?= $post->title ?>
                    </a>  
                </h1>    
                <p><?= $post->resumen ?></p> 
        </article>
        <!-- ?php endforeach; ?> -->
        @endforeach
    @else
            I don't have any posts!
    @endif    
@endsection