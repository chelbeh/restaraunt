<section class="section parallax parallax-counter">

    <div class="container">
        <div class="row">
            @foreach($services as $service)
                <div class="col-lg-3 col-md-6">
                    <div class="text-center text-white">
                        <div class="service-icon d-inline-block">
                            <img src="/img/services/icon-{{$service['icon']}}.png" alt="">
                        </div>
                        <h3 class="service-header">
                            {{$service['header']}}
                        </h3>
                        <p class="lead service-header">
                            {{$service['text']}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>
