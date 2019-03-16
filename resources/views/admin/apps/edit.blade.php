@extends('layouts.admin')

@section('content')
    <div class="row">
        @include('admin.apps.partials.sidebar')
        <div class="col-md-9">
            <div class="card card-default shadow">
                <h3 class="card-header">{{$app->name}}</h3>

                <div class="card-body">
                    <form action="{{ route('apps.update', $app->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name" placeholder="Введите название"
                                   value="{{$app->name}}">
                        </div>

                        <div class="form-group">
                            <label for="url">Ссылка</label>
                            <input type="text" class="form-control" name="url" placeholder="Введите ссылку"
                                   value="{{$app->url}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Сохранить страницу</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
