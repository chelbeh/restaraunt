<section class="section bg-section">
    <div class="container">
        <div class="text-center">
            <div class="section-header title-font">
                Наши фотографии
            </div>
            <h2 class="font-weight-bold">Галерея</h2>
        </div>
        <div class="gallery">
            @foreach($images as $image)
                <a data-fancybox="gallery" href="/img/gallery/{{$image->getFilename()}}"><img class="img-fluid img-thumbnail" style="max-height: 180px; margin: 5px" src="/img/gallery/{{$image->getFilename()}}"></a>
            @endforeach
        </div>
    </div>
</section>