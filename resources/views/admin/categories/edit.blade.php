@extends('layouts.admin')

@section('content')
    <div class="row">

        <div class="col-md-9">
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

                        <button type="submit" class="btn btn-primary">Сохранить категорию</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
