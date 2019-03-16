@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <h3 class="card-header">Приложения <a href="{{ route('apps.create') }}"
                                                      class="btn btn-sm btn-outline-primary float-right"><i
                            class="fas fa-plus"></i> Новое приложение</a></h3>
                <div class="card-body table-responsive">
                    <table class="table align-items-center table-flush table-sm">
                        <thead class="thead-light">
                        <tr>
                            <th>
                                <label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="checkbox_all custom-control-input checkbox_delete"
                                               id="app-check-all" name="entries_to_delete[]">
                                        <label class="custom-control-label" for="app-check-all">&nbsp;</label>
                                    </div>
                                </label>
                            </th>
                            <th>Название</th>
                            <th>Редактировать</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($apps as $app)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input value="{{ $app->id }}" type="checkbox"
                                               class="custom-control-input checkbox_delete"
                                               id="app-check-{{ $app->id }}" name="entries_to_delete[]">
                                        <label class="custom-control-label"
                                               for="app-check-{{ $app->id }}">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="/{{ $app->url }}">{{ $app->name }}</a></td>
                                <td>
                                    <a href="{{ route('apps.edit', $app->id) }}" class="btn btn-sm btn-info"> <i
                                            class="fas fa-edit text-white"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('apps.destroy', $app->id) }}" method="POST"
                                          style="display: inline"
                                          onsubmit="return confirm('Вы уверены?');">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
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
                    <form action="{{ route('apps.mass_destroy') }}" method="post"
                          onsubmit="return confirm('Вы уверены?');">
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
