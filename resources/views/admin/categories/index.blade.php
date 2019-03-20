@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <h3 class="card-header">Категории <a href="{{ route('categories.create') }}"
                                                      class="btn btn-sm btn-outline-primary float-right"><i
                            class="fas fa-plus"></i> Новая категория</a></h3>
                <div class="card-body table-responsive">
                    <table class="table align-items-center table-flush table-sm">
                        <thead class="thead-light">
                        <tr>
                            <th>
                                <label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="checkbox_all custom-control-input checkbox_delete"
                                               id="category-check-all" name="entries_to_delete[]">
                                        <label class="custom-control-label" for="category-check-all">&nbsp;</label>
                                    </div>
                                </label>
                            </th>
                            <th>Название</th>
                            <th>Родительская категория</th>
                            <th>Редактировать</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input value="{{ $category->id }}" type="checkbox"
                                               class="custom-control-input checkbox_delete"
                                               id="category-check-{{ $category->id }}" name="entries_to_delete[]">
                                        <label class="custom-control-label"
                                               for="category-check-{{ $category->id }}">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="/{{ $category->url }}">{{ $category->name }}</a></td>
                                <td>{{ implode(' > ', $category->ancestors->pluck('name')->toArray())}}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-info"> <i
                                            class="fas fa-edit text-white"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
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
                </div>
            </div>
        </div>
    </div>
@endsection
