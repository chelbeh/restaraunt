@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Административная панель</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#!" class="btn btn-sm btn-primary">Настройки</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Приложения</h3>
                    @foreach($apps as $app)
                        <a href="{{$app['url']}}">{{$app['name']}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection