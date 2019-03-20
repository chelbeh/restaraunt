@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <h3 class="card-header">Товары <a href="{{ route('products.create') }}"
                                                  class="btn btn-sm btn-outline-primary float-right"><i
                            claass="fas fa-plus"></i> Новый товар</a></h3>
                <div class="card-body table-responsive">
                    <table class="table align-items-center table-flush table-sm">
                        <thead class="thead-light">
                        <tr>
                            <th>
                                <label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="checkbox_all custom-control-input checkbox_delete"
                                               id="product-check-all" name="entries_to_delete[]">
                                        <label class="custom-control-label" for="product-check-all">&nbsp;</label>
                                    </div>
                                </label>
                            </th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Редактировать</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input value="{{ $product->id }}" type="checkbox"
                                               class="custom-control-input checkbox_delete"
                                               id="product-check-{{ $product->id }}" name="entries_to_delete[]">
                                        <label class="custom-control-label"
                                               for="product-check-{{ $product->id }}">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="/{{ $product->url }}">{{ $product->name }}</a></td>
                                <td>
                                    @foreach($product->categories as $product_category)
                                        {{$product_category->name}}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info"> <i
                                            class="fas fa-edit text-white"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
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
                    <form action="{{ route('products.mass_destroy') }}" method="post"
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
