@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1617px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sources</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.source.index') }}">Sources</a></li>
                            <li class="breadcrumb-item active">Search sources</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Products</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.source.index') }}" class="btn btn-tool btn-sm">
                                        <ion-icon name="folder-open-outline"></ion-icon>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle" id="resultTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Имя</th>
                                        <th>Статтей</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Заполните форму для поиска</h3>
                                </div>
                            </div>
                            <form id="searchForm" method="POST">
                                @method('POST')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category">
                                            @foreach($categories as $category)
                                                <option value="{{ $category }}" {{ $category === 'general' ? 'selected' : '' }}>{{ $category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" name="country">
                                            @foreach($countries as $country)
                                                <option value="{{ $country }}" {{ $country === 'ru' ? 'selected' : '' }}>{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Language</label>
                                        <select class="form-control" name="language">
                                            @foreach($languages as $language)
                                                <option value="{{ $language }}" {{ $language === 'ru' ? 'selected' : '' }}>{{ $language }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-default toastsDefaultDefault">
                                    Launch Default Toast
                                </button>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-outline-secondary action-button_1">Поиск</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('table-search-source')
    <!-- Скрипт JavaScript для аякс-запроса -->
    <script>
        $(document).ready(function () {
            var form = $('#searchForm');
            var button = form.find('.action-button_1');

            // Обработчик события change на селекте "Category"
            form.find('select[name="category"], select[name="country"], select[name="language"], input[name="keyword"]').change(function () {
                resetButton();
            });

            form.submit(function (event) {
                event.preventDefault();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.source.search') }}',
                    data: form.serialize(),
                    success: handleSearchSuccess,
                    error: handleSearchError
                });
            });

            // Обработчик события для кнопок сохранения (с использованием делегирования)
            $('#resultTable').on('click', '.save-button', handleSaveButtonClick);

            function resetButton() {
                button.removeClass('completed-action btn-success btn-danger');
                button.addClass('btn-outline-secondary');
                button.text('Search');
            }

            function handleSearchSuccess(response) {
                $('#resultTable tbody').empty();

                if (Array.isArray(response.sources) && response.sources.length > 0) {
                    button.addClass('completed-action btn-success');
                    button.text('Поиск выполнен');

                    showNotification('success', 'Успех', 'Поиск выполнен успешно.');
                } else {
                    button.addClass('btn-danger');
                    button.text('Пустой ответ');

                    showNotification('warning', 'Внимание', 'Пустой ответ на поиск.');
                }

                $.each(response.sources, function (index, source) {
                    var newRow = '<tr><td>' + source.id + '</td><td>' + source.name + '</td><td><button class="btn btn-outline-secondary save-button">add</button></td></tr>';
                    $('#resultTable tbody').append(newRow);
                });
            }

            function handleSearchError(xhr, status, errorThrown) {
                var errorMessage = 'Ошибка при выполнении действия: ' + errorThrown;
                $('#error-message').text(errorMessage);
                console.log(data);

                showNotification('error', 'Ошибка', errorMessage);
            }

            function handleSaveButtonClick() {
                var button = $(this);
                var row = $(this).closest('tr');
                var idName = row.find('td:first-child').text();
                var name = row.find('td:nth-child(2)').text();

                var dataToSave = {
                    idName: idName,
                    name: name,
                };

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.source.save') }}',
                    data: dataToSave,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log('Данные успешно сохранены');
                        button.removeClass('btn-outline-secondary').addClass('completed-action btn-success');
                        button.text('added');

                        showNotification('success', 'Успех', 'Данные успешно сохранены.');
                    },
                    error: function (xhr, status, errorThrown) {
                        var errorMessage = 'Ошибка при сохранении данных: ' + errorThrown;
                        console.log(errorMessage);
                        button.removeClass('btn-outline-secondary').addClass('btn-danger');
                        button.text('error');

                        showNotification('error', 'Ошибка', errorMessage);
                    }
                });
            }

            function showNotification(type, title, message) {
                toastr[type](message, title);
            }
        });
    </script>


@endsection
