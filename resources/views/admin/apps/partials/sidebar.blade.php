<div class="col-md-3">
    <div class="card bg-default shadow">
        <h3 class="text-white card-header bg-transparent">Приложения</h3>
        <div class="card-body text-white">
            <ul class="list-group list-group-flush bg-default">
                @foreach($apps as $a)
                    <li class="list-group-item bg-default"><a
                                href="{{ route('pages.edit', $a->id) }}">{{$a->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
