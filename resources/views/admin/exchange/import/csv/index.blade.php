@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">CSV Импорт</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('importcsv.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="csv_file" name="csv_file">
                                <label class="custom-file-label" for="csv_file">Выберите файл</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="header" checked> Файл содержит заголовок?
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Разобрать файл
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".custom-file-input").on("change", function() {
        let fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection
