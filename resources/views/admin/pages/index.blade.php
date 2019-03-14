@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <h3 class="card-header">Страницы <a href="{{ route('pages.create') }}"
                                                    class="btn btn-sm btn-outline-primary float-right"><i
                                class="fas fa-plus"></i> Новая страница</a></h3>
                <div class="card-body table-responsive">
                    <table class="table align-items-center table-flush table-sm">
                        <thead class="thead-light">
                        <tr>
                            <th>
                                <label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="checkbox_all custom-control-input checkbox_delete"
                                               id="page-check-all" name="entries_to_delete[]">
                                        <label class="custom-control-label" for="page-check-all">&nbsp;</label>
                                    </div>
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
                                    <div class="custom-control custom-checkbox">
                                        <input value="{{ $page->id }}" type="checkbox"
                                               class="custom-control-input checkbox_delete"
                                               id="page-check-{{ $page->id }}" name="entries_to_delete[]">
                                        <label class="custom-control-label"
                                               for="page-check-{{ $page->id }}">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="/{{ $page->url }}">{{ $page->name }}</a></td>
                                <td>{{ $page->body }}</td>
                                <td>
                                    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-info"> <i
                                                class="fas fa-edit text-white"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST"
                                          style="display: inline"
                                          onsubmit="return confirm('Вы уверены?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="ids" id="ids" value=""/>
                        <input type="submit" value="Удалить выбранные" class="btn btn-sm btn-danger"/>
                    </form>
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