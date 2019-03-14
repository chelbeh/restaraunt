<div class="col-md-3">
    <div class="card bg-default shadow">
        <h3 class="text-white card-header bg-transparent">Страницы</h3>
        <div class="card-body text-white">
            <ul class="list-group list-group-flush bg-default">
                @foreach($pages as $p)
                    <li class="list-group-item bg-default"><a
                                href="{{ route('pages.edit', $p->id) }}">{{$p->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>