 @extends('layaout')

 @section('content')
    <?php foreach ($posts as $post): ?>
        <article>
            <h1>
                <a href="/post/<?= $post->slug?>">
                    <?= $post->title ?>
                </a>
            </h1>
            <p><?=$post->resumen?></p>
        </article>
    <?php endforeach; ?> 
    @endsection