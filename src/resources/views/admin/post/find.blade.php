@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1617px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Posts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                            <li class="breadcrumb-item active">Post searching</li>
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
                                    <ul class="nav ml-auto p-2">
                                        <li class="nav-item dropdown">
                                            <a class="btn btn-tool btn-sm dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                                <ion-icon name="search-outline"></ion-icon> <span class="caret"></span>
                                            </a>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item" tabindex="-1" href="{{ route('admin.post.category.search.index') }}">by category</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" tabindex="-1" href="{{ route('admin.post.search.source.index') }}">by source</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" tabindex="-1" href="{{ route('admin.post.search.everything.index') }}">by everything</a>

                                            </div>
                                        </li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm" href="{{ route('admin.post.create') }}"><ion-icon name="cloud-upload-outline"></ion-icon></a></li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm" href="{{ route('admin.post.index') }}"><ion-icon name="folder-open-outline"></ion-icon></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle" id="resultTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Имя</th>
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
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">Tabs</h3>
                                <ul class="nav nav-pills ml-auto p-1">
                                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"><ion-icon name="bookmark-outline"></ion-icon></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"><ion-icon name="bookmarks-outline"></ion-icon></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab"><ion-icon name="apps-outline"></ion-icon></a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <p class="float-right">by categories</p><br>
                                            <form id="searchForm1" class="search-form" action="{{ route('admin.search.category') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                    <div class="form-group">
                                                        <label for="q">keyword</label>
                                                        <input type="text" class="form-control" name="q" placeholder="Enter keyword" required>
                                                    </div>
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control" name="country">
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country }}">{{ $country }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="form-control" name="category">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category }}">{{ $category }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>page</label>
                                                    <select class="form-control" name="page">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                    </select>
                                                </div>

                                                    <button type="submit" class="btn btn-outline-secondary">Search</button>
                                            </form>
                                    </div>

                                    <div class="tab-pane" id="tab_2">
                                        <p class="float-right">by sources</p><br>
                                        <form id="searchForm#2" class="search-form" action="{{ route('admin.search.source') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="q">keyword</label>
                                                <input type="text" class="form-control" name="q" placeholder="Enter keyword" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Sources</label>
                                                @if(isset($sources))
                                                <select class="select2 select2-hidden-accessible" name="sources" id="sources" multiple="" data-placeholder="Select sources" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    @foreach($sources as $source)
                                                    <option data-select2-id1="{{ $source->idName }}">{{ $source->name }}</option>
                                                        @endforeach
                                                </select>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <label>page</label>
                                                <select class="form-control" name="page">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-outline-secondary">Search</button>

                                        </form>
                                    </div>

                                    <div class="tab-pane" id="tab_3">
                                        <p class="float-right">by everything</p><br>
                                        <form id="searchForm#3" class="search-form" action="{{ route('admin.search.everything') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="q">keyword</label>
                                                <input type="text" class="form-control" name="q" placeholder="Enter keyword" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Multiple</label>
                                                @if(isset($sources))
                                                    <select class="select2 select2-hidden-accessible" name="sources2" id="sources2" multiple="" data-placeholder="Select sources" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                        @foreach($sources as $source)
                                                            <option data-select2-id2="{{ $source->idName }}">{{ $source->name }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Language</label>
                                                <select class="form-control" name="language">
                                                    @foreach($languages as $language)
                                                        <option value="{{ $language }}">{{ $language }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>page</label>
                                                <select class="form-control" name="page">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>sortBy</label>
                                                <select class="form-control" name="sortBy">
                                                    <option value="relevancy">relevancy</option>
                                                    <option value="popularity">popularity</option>
                                                    <option value="publishedAt">publishedAt</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-outline-secondary">Search</button>

                                        </form>
                                    </div>

                                </div>

                            </div>
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
            $('#searchForm1').submit(function (event) {
                event.preventDefault(); // Предотвращение стандартной отправки формы

                var form = $(this); // Получаем текущую форму
                var button = form.find('.btn');
                var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Получение CSRF-токена

                // Настройка заголовков Ajax-запроса для отправки CSRF-токена
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: form.attr('action'), // Используем атрибут action текущей формы
                    data: form.serialize(),
                    success: function (response) {
                        // Очищаем tbody таблицы
                        $('#resultTable tbody').empty();

                        // Проверяем, есть ли элементы в массиве index.blade.php
                        if (Array.isArray(response.articles) && response.articles.length > 0) {
                            // Если есть элементы, устанавливаем стиль кнопки на btn-success (зеленый)
                            button.addClass('completed-action btn-success');
                            button.text('Поиск выполнен');
                        } else {
                            // Если массив index.blade.php пустой, устанавливаем стиль кнопки на btn-danger (красный)
                            button.addClass('btn-block btn-warning');
                            button.text('Пустой ответ');
                        }
                        // Перебираем полученные данные и вставляем их в таблицу
                        $.each(response.articles, function (index, article) {
                            var articleJson = JSON.stringify(article); // Преобразовать статью в строку JSON
                            var newRow = '<tr><td>' + article.publishedAt + '</td><td>' + article.title + '</td><td><button class="btn btn-outline-secondary save-button" data-article=\'' + articleJson + '\'>add</button></td></tr>';
                            $('#resultTable tbody').append(newRow);
                        });
                        setTimeout(function () {
                            button.removeClass('btn-success completed-action btn-block btn-warning');
                            button.text('Search');
                        }, 3000);
                    },
                    error: function (xhr, status, errorThrown) {
                        var errorMessage = 'Ошибка при выполнении действия: ' + errorThrown;
                        $('#error-message').text(errorMessage);
                         button.addClass('btn-danger');
                        button.text('error');
                        setTimeout(function () {
                            button.removeClass('btn-danger completed-action');
                            button.text('Search');
                        }, 3000);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#searchForm2').submit(function (event) {
                event.preventDefault(); // Предотвращение стандартной отправки формы

                var form = $(this); // Получаем текущую форму
                var button = form.find('.btn');
                var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Получение CSRF-токена

                // Настройка заголовков Ajax-запроса для отправки CSRF-токена
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: form.attr('action'), // Используем атрибут action текущей формы
                    data: form.serialize(),
                    success: function (response) {
                        // Очищаем tbody таблицы
                        $('#resultTable tbody').empty();

                        // Проверяем, есть ли элементы в массиве index.blade.php
                        if (Array.isArray(response.articles) && response.articles.length > 0) {
                            // Если есть элементы, устанавливаем стиль кнопки на btn-success (зеленый)
                            button.addClass('completed-action btn-success');
                            button.text('Поиск выполнен');
                        } else {
                            // Если массив index.blade.php пустой, устанавливаем стиль кнопки на btn-danger (красный)
                            button.addClass('btn-block btn-warning');
                            button.text('Пустой ответ');
                        }
                        //   console.log(response);
                        // Перебираем полученные данные и вставляем их в таблицу
                        // Перебираем полученные данные и вставляем их в таблицу
                        $.each(response.articles, function (index, article) {
                            var articleJson = JSON.stringify(article); // Преобразовать статью в строку JSON
                            var newRow = '<tr><td>' + article.publishedAt + '</td><td>' + article.title + '</td><td><button class="btn btn-outline-secondary save-button" data-article=\'' + articleJson + '\'>add</button></td></tr>';
                            $('#resultTable tbody').append(newRow);
                        });
                        setTimeout(function () {
                            button.removeClass('btn-success completed-action btn-block btn-warning');
                            button.text('Search');
                        }, 3000);
                    },
                    error: function (xhr, status, errorThrown) {
                        var errorMessage = 'Ошибка при выполнении действия: ' + errorThrown;
                        $('#error-message').text(errorMessage);
                        button.addClass('btn-danger');
                        button.text('error');
                        setTimeout(function () {
                            button.removeClass('btn-danger completed-action');
                            button.text('Search');
                        }, 3000);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#searchForm3').submit(function (event) {
                event.preventDefault(); // Предотвращение стандартной отправки формы

                var form = $(this); // Получаем текущую форму
                var button = form.find('.btn');
                var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Получение CSRF-токена
                // Настройка заголовков Ajax-запроса для отправки CSRF-токена
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: form.attr('action'), // Используем атрибут action текущей формы
                    data: form.serialize(),
                    success: function (response) {
                        // Очищаем tbody таблицы
                        $('#resultTable tbody').empty();

                        // Проверяем, есть ли элементы в массиве index.blade.php
                        if (Array.isArray(response.articles) && response.articles.length > 0) {
                            // Если есть элементы, устанавливаем стиль кнопки на btn-success (зеленый)
                            button.addClass('completed-action btn-success');
                            button.text('Поиск выполнен');
                        } else {
                            // Если массив index.blade.php пустой, устанавливаем стиль кнопки на btn-danger (красный)
                            button.addClass('btn-block btn-warning');
                            button.text('Пустой ответ');
                        }
                        //   console.log(response);
                        // Перебираем полученные данные и вставляем их в таблицу
                        $.each(response.articles, function (index, article) {
                            var articleJson = JSON.stringify(article); // Преобразовать статью в строку JSON
                            var newRow = '<tr><td>' + article.publishedAt + '</td><td>' + article.title + '</td><td><button class="btn btn-outline-secondary save-button" data-article=\'' + articleJson + '\'>add</button></td></tr>';
                            $('#resultTable tbody').append(newRow);
                        });
                        setTimeout(function () {
                            button.removeClass('btn-success completed-action btn-block btn-warning');
                            button.text('Search');
                        }, 3000);
                    },
                    error: function (xhr, status, errorThrown) {
                        var errorMessage = 'Ошибка при выполнении действия: ' + errorThrown;
                        $('#error-message').text(errorMessage);
                        button.addClass('btn-danger');
                        button.text('error');
                        setTimeout(function () {
                            button.removeClass('btn-danger completed-action');
                            button.text('Search');
                        }, 3000);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#resultTable').on('click', '.save-button', function () {
                var button = $(this);
                var articleData = button.data('article'); // Декодируем JSON-строку в объект JavaScript
                var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Получение CSRF-токена
                // Отправляем данные статьи на сервер, например, на какой-то роут
                // Настройка заголовков Ajax-запроса для отправки CSRF-токена
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                console.log(articleData);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.post.save') }}', // Замените на ваш роут для сохранения статьи
                    data: { article: articleData },
                    success: function (response) {
                        // Обработка успешного сохранения статьи
                        console.log('Статья успешно сохранена');
                        console.log(response);
                        button.removeClass('btn-outline-secondary').addClass('completed-action btn-success');
                        // Изменяем текст кнопки
                        button.text('added');
                    },
                    error: function (xhr, status, errorThrown) {
                        // Обработка ошибки при сохранении статьи
                        console.error('Ошибка при сохранении статьи: ' + errorThrown + xhr + status ) ;
                        button.removeClass('btn-outline-secondary').addClass('btn-danger');
                        // Изменяем текст кнопки
                        button.text('error');
                    }
                });
            });
        });
    </script>
@endsection
