<section class="section bg-section">
    <div class="corner-img menu-corner">
        {{--<img src="img/menu-corner.png" alt="" class="wow slideInLeft">--}}
    </div>
    <div class="container">
        <div class="text-center">
            <div class="section-header title-font">
                Наши популярные блюда
            </div>
            <h2 class="font-weight-bold">Меню</h2>
        </div>

        <ul class="nav nav-tabs" id="menu-tab" role="tablist">
            @foreach($dishes as $key => $category)
                <li class="nav-item ">
                    <a class="nav-link {{ $key==0 ? 'active' : ''}}" id="{{$category['url']}}-tab"
                       data-toggle="tab-{{$category['url']}}" href="#{{$category['url']}}" role="tab"
                       aria-controls="home" aria-selected="true">{{$category->name}}</a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach($dishes as $key => $category)
                <div class="tab-pane {{ $key==0 ? 'active' : ''}}" id="{{$category['url']}}" role="tabpanel"
                     aria-labelledby="{{$category['url']}}-tab">

                    <div class="card-deck">
                        @forelse($category->products as $product)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{$product->name}}
                                        <span class="badge badge-primary float-right">{{$product->original_price}}</span>
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$product->portion}}</h6>
                                    <p class="card-text">
                                        {{$product->description}}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="card">
                                <div class="card-body">Извините, блюда в режиме наполнения</div>
                            </div>
                        @endforelse
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>
<script>
    $('#menu-tab a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show')
    })
</script>
