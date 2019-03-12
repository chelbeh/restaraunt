@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <h5 class="card-header">Страницы <a href="{{ route('pages.create') }}"
                                                        class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-plus"></i> Новая страница</a></h5>
                    @include('helper.message')
                    <div class="card-body">
                        <table class="table table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox_all">
                                    </label>
                                </th>
                                <th>Название</th>
                                <th>Содержание</th>
                                <th>Редактировать</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($pages as $page)
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" class="checkbox_delete"
                                                   name="entries_to_delete[]" value="{{ $page->id }}"/>
                                        </label>
                                    </td>
                                    <td><a href="/{{ $page->url }}">{{ $page->name }}</a></td>
                                    <td>{{ $page->body }}</td>
                                    <td>
                                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-info"> <i class="fas fa-edit text-white"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST"
                                              style="display: inline"
                                              onsubmit="return confirm('Вы уверены?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Записи не найдены.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <form action="{{ route('pages.mass_destroy') }}" method="post"
                              onsubmit="return confirm('Are you sure?');">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="ids" id="ids" value=""/>
                            <input type="submit" value="Удалить выбранные" class="btn btn-danger"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.checkbox_all', function () {
            $('input.checkbox_delete').prop('checked', this.checked);
        });

        function getIDs() {
            let ids = [];

            $('.checkbox_delete').each(function () {
                if ($(this).is(":checked")) {
                    ids.push($(this).val());
                }
            });

            $('#ids').val(ids.join());
        }

        $(document).on('click', '.checkbox_all', function () {
            $('input.checkbox_delete').prop('checked', this.checked);
            getIDs();
        });

        $(document).on('click', '.checkbox_delete', function () {
            getIDs();
        });
    </script>
@endsection