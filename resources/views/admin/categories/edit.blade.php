@extends('layouts.admin')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-default shadow">
                <h3 class="card-header">{{$category->name}}</h3>

                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name" placeholder="Введите название"
                                   value="{{$category->name}}">
                        </div>

                        <div class="form-group">
                            <label for="url">Ссылка</label>
                            <input type="text" class="form-control" name="url" placeholder="Введите ссылку"
                                   value="{{$category->url}}">
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Родительская категория</label>
                                <select name="parent_id" class="custom-select">
                                    <option>Выберите категорию</option>
                                    @foreach($categories as $c)
                                        <option
                                            @if($category['parent_id'] == $c['id']) selected @endif
                                        value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Сохранить категорию</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("input[name='name']").on("change paste keyup", function () {
                let url_value = translit().transform($(this).val(), '-');
                let url_formatted = url_value.toLowerCase().replace("'", "");
                $("input[name='url']").val(url_formatted);
            });
        });
    </script>
@endsection
