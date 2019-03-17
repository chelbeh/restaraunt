<form class="form-horizontal" method="POST" action="{{ route('importcsv.store') }}">
    @csrf

    <table class="table">
        @foreach ($csv_data as $row)
            <tr>
                @foreach ($row as $key => $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
        <tr>
            @foreach ($csv_data[0] as $key => $value)
                <td>
                    <select name="fields[{{ $key }}]">
                        @foreach ($columns as $column)
                            <option value="{{ $loop->index }}">{{ $column }}</option>
                        @endforeach
                    </select>
                </td>
            @endforeach
        </tr>
    </table>

    <button type="submit" class="btn btn-primary">
        Импортировать данные
    </button>
</form>
