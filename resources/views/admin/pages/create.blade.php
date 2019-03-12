@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <h5 class="card-header">Создание страницы</h5>
                    @include('helper.errors')

                    <div class="card-body">

                        <form action="{{ route('pages.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" class="form-control" name="name" placeholder="Введите название"
                                       value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                                <label for="url">Ссылка</label>
                                <input type="text" class="form-control" name="url" placeholder="Введите ссылку"
                                       value="{{old('url')}}">
                            </div>

                            <div class="form-group">
                                <label for="body">Содержимое</label>
                                <textarea id="editor" class="form-control" name="body"
                                          placeholder="Введите содержимое">{{old('body')}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Создать страницу</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection