@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <h3 class="card-header">Создание товара</h3>
                <div class="card-body">

                    <form action="{{ route('products.store') }}" method="post">
                        @csrf

                       {{-- <div class="form-group">
                            <label for="status">В наличии</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="status" name="status">
                                <label class="custom-control-label" for="status">&nbsp;</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="in_stock">Опубликован</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="in_stock" name="in_stock">
                                <label class="custom-control-label" for="in_stock">&nbsp;</label>
                            </div>
                        </div>--}}

                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name" placeholder="Введите название"
                                   value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id" class="custom-select">
                                <option selected>Выберите категорию</option>

                                @foreach($categories as $category)
                                    <option @if($category->id == 9) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="url">Ссылка</label>
                            <input type="text" class="form-control" name="url" placeholder="Введите ссылку"
                                   value="{{old('url')}}">
                        </div>

                        <div class="form-group">
                            <label for="original_price">Цена</label>
                            <input type="number" class="form-control" name="original_price" placeholder="Введите цену"
                                   value="{{old('original_price')}}">
                        </div>

                    {{--    <div class="form-group">
                            <label for="discount_price">Цена со скидкой</label>
                            <input type="number" class="form-control" name="discount_price"
                                   placeholder="Введите цену со скидкой"
                                   value="{{old('discount_price')}}">
                        </div>

                        <div class="form-group">
                            <label for="purchase_price">Цена закупочная</label>
                            <input type="number" class="form-control" name="purchase_price"
                                   placeholder="Введите закупочную цену"
                                   value="{{old('purchase_price')}}">
                        </div>--}}

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea id="description" class="form-control" name="description"
                                      placeholder="Введите описание">{{old('description')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="portion">Порция</label>
                            <input type="text" class="form-control" name="portion" placeholder="Введите порцию"
                                   value="{{old('portion')}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Создать товар</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("input[name='name']").on("change paste keyup", function () {
                let url_value = translit().transform($(this).val(), '-');
                let url_formatted = url_value.toLowerCase().replace("'", "");
                $("input[name='url']").val(url_formatted);
            });
        });
    </script>
@endsection
