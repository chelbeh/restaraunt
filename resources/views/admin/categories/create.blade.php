@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <h3 class="card-header">Создание категории</h3>
                <div class="card-body">

                    <form action="{{ route('categories.store') }}" method="post">
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


                        <button type="submit" class="btn btn-primary">Создать категорию</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
