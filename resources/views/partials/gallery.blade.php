<section class="section bg-section">
    <div class="container">
        <div class="text-center">
            <div class="section-header title-font">
                Наши фотографии
            </div>
            <h2>Галерея</h2>
        </div>
        <div class="gallery">
            @foreach($images as $image)
                <a data-fancybox="gallery" href="/img/gallery/{{$image->getFilename()}}"><img style="max-height: 100px;" src="/img/gallery/{{$image->getFilename()}}"></a>
            @endforeach
        </div>
    </div>
</section>