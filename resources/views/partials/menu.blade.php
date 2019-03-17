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
                @if($category->depth == 0)
                    @if(count($category->descendants) == 0)
                        <li class="nav-item ">
                            <a class="nav-link {{ $key==0 ? 'active' : ''}}" id="{{$category->url}}-tab"
                               data-toggle="tab-{{$category->url}}" href="#{{$category->url}}" role="tab"
                               aria-controls="home" aria-selected="true">{{$category->name}}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                {{$category->name}}
                            </a>
                            <div class="dropdown-menu">
                                @foreach($category->descendants as $descendant)
                                    <a class="dropdown-item" href="#{{$descendant->url}}">{{$descendant->name}}</a>
                                @endforeach
                            </div>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>

        <div class="tab-content row">
            @foreach($dishes as $key => $category)
                <div class="tab-pane {{ $key==0 ? 'active' : ''}}" id="{{$category['url']}}" role="tabpanel"
                     aria-labelledby="{{$category['url']}}-tab">

                    <div class="row">
                        @forelse($category->products as $product)
                            <div class="card col-3">
                                <div class="card-body">
                                    <h5 class="card-title m-0 p-0">
                                        {{$product->name}}
                                    </h5>

                                    <h5>
                                        <span class="badge badge-primary">
                                            {{number_format($product->original_price, 0)}} ₽
                                        </span>
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
