@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <h5 class="card-header">Редактирование страницы <b>"{{$page->name}}"</b></h5>

                    <div class="card-body">
                        @include('helper.errors')

                        <form action="{{ route('pages.update', $page->id) }}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" class="form-control" name="name" placeholder="Введите название" value="{{$page->name}}">
                            </div>

                            <div class="form-group">
                                <label for="url">Ссылка</label>
                                <input type="text" class="form-control" name="url" placeholder="Введите ссылку" value="{{$page->url}}">
                            </div>

                            <div class="form-group">
                                <label for="body">Содержимое</label>
                                <textarea class="form-control" name="body" placeholder="Введите содержимое">{{$page->body}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Сохранить страницу</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection