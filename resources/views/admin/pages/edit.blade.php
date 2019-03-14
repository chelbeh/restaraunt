@extends('layouts.admin')

@section('content')
    <div class="row">
        @include('admin.pages.partials.sidebar')
        <div class="col-md-9">
            <div class="card card-default shadow">
                <h3 class="card-header">{{$page->name}}</h3>

                <div class="card-body">
                    <form action="{{ route('pages.update', $page->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name" placeholder="Введите название"
                                   value="{{$page->name}}">
                        </div>

                        <div class="form-group">
                            <label for="url">Ссылка</label>
                            <input type="text" class="form-control" name="url" placeholder="Введите ссылку"
                                   value="{{$page->url}}">
                        </div>

                        <div class="form-group">
                            <label for="body">Содержимое</label>
                            <textarea class="form-control" name="body"
                                      placeholder="Введите содержимое">{{$page->body}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Сохранить страницу</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection