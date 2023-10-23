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
                            <li class="breadcrumb-item active">Post searching [by everything]</li>
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
                                <div class="card-tools ml-auto">
                                    <ul class="nav ml-auto p-3">
                                        <li class="nav-item dropdown">
                                            <a class="btn btn-tool btn-sm dropdown-toggle d-flex align-items-center nav-link {{ request()->is('admin/post/search*') ? 'active' : '' }}" data-toggle="dropdown" href="#" aria-expanded="false">
                                                <ion-icon name="search-outline"></ion-icon> <span class="caret"></span>
                                            </a>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item " tabindex="-1" href="{{ route('admin.post.category.search.index') }}">by category</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" tabindex="-1" href="{{ route('admin.post.search.source.index') }}">by source</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" tabindex="-1" href="{{ route('admin.post.search.everything.index') }}">by everything</a>
                                            </div>
                                        </li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/post/create*') ? 'active' : '' }}" href="{{ route('admin.post.create') }}"><ion-icon name="cloud-upload-outline"></ion-icon></a></li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/post/unpublished*') ? 'active' : '' }}" href="{{ route('admin.post.unpublished') }}"><ion-icon name="eye-off-outline"></ion-icon></a></li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/post') ? 'active' : '' }}" href="{{ route('admin.post.index') }}"><ion-icon name="eye-outline"></ion-icon></a></li>
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
                            <div class="card-header border-0">
                                <h3 class="card-title">Products</h3>
                                <div class="card-tools ml-auto">
                                    <ul class="nav ml-auto p-3">
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/post/search/category') ? 'active' : '' }}" href="{{ route('admin.post.category.search.index') }}"><ion-icon name="file-tray-full-outline"></ion-icon></a></li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/post/search/source') ? 'active' : '' }}" href="{{ route('admin.post.search.source.index') }}"><ion-icon name="file-tray-stacked-outline"></ion-icon></a></li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/post/search/everything') ? 'active' : '' }}" href="{{ route('admin.post.search.everything.index') }}"><ion-icon name="globe-outline"></ion-icon></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="content">
                                        <p class="float-right">*by everything</p><br>
                                        <form id="searchForm3" class="search-form" action="{{ route('admin.post.search.everything.find') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="q">keyword</label>
                                                <input type="text" class="form-control" name="q" placeholder="Enter keyword" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Multiple</label>
                                                @if(isset($sources))
                                                    <select class="select2 select2-hidden-accessible" name="sources[]" id="sources" multiple="" data-placeholder="Select sources" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">

                                                        @foreach($sources as $source)
                                                            <option data-select2-id2="{{ $source->idName }}">{{ $source->name }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Language</label>
                                                <select class="form-control" name="language">
                                                    <option value=""> выберите язык</option>
                                                    @foreach($languages as $language)
                                                        <option value="{{ $language }}" {{ $language === 'ru' ? 'selected' : '' }}>{{ $language }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>page</label>
                                                <select class="form-control" name="page">
                                                    <option value=""> выберите страницу</option>
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>sortBy [required]</label>
                                                <select class="form-control" name="sort_by" required>
                                                    <option value=""> выберите сортировку</option>
                                                    <option value="relevancy">relevancy</option>
                                                    <option value="popularity" selected>popularity</option>
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
        <div class="modal fade" id="myModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Подробнее</h5>

                    </div>
                    <div class="modal-body">
                        <!-- Тут буде виведена інформація про статтю -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-button" data-dismiss="modal">Закрыть</button>
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
            const form = $('#searchForm3');
            const resultTable = $('#resultTable tbody');
            const button = form.find('.btn');
            const modalBody = $('#myModal3 .modal-body');
            const modal = $('#myModal3');

            form.submit(function (event) {
                event.preventDefault();
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: handleSearchSuccess,
                    error: handleSearchError,
                });
            });

            function handleSearchSuccess(response) {
                resultTable.empty();

                if (Array.isArray(response.articles) && response.articles.length > 0) {
                    button.removeClass('btn-outline-secondary');
                    button.addClass('completed-action btn-success').text('Поиск выполнен');

                    showNotification('success', 'Успех', 'Поиск выполнен успешно.');
                } else {
                    button.addClass('btn-block btn-warning').text('Пустой ответ');

                    showNotification('warning', 'Внимание', 'Пустой ответ на поиск.');
                }

                $.each(response.articles, function (index, article) {
                    const formattedDate = moment(article.publishedAt).format('DD.MM.YYYY');
                    const newRow = `
            <tr>
                <td>${formattedDate}</td>
                <td>${article.title}</td>
                <td><button type="button" class="btn btn-primary view-button">View</button></td>
                <td>
                    <form class="save-form">
                        ${generateInputFields(article)}
                        <button type="submit" class="btn btn-outline-secondary save-button">add</button>
                    </form>
                </td>
            </tr>`;
                    resultTable.append(newRow);
                });
                setTimeout(resetButton, 3000);
            }

            function handleSearchError(xhr, status, errorThrown) {
                const errorMessage = 'Ошибка при выполнении поиска: ' + errorThrown;
                $('#error-message').text(errorMessage);
                button.addClass('btn-danger').text('error');
                setTimeout(resetButton, 3000);

                showNotification('error', 'Ошибка', 'Ошибка при выполнении поиска: ' + errorThrown);
            }

            function showNotification(type, title, message) {
                toastr[type](message, title);
            }

            function generateInputFields(article) {
                let inputs = '';
                for (const key in article) {
                    inputs += `<input type="hidden" name="${key}" value='${article[key]}'>`;
                }
                return inputs;
            }

            resultTable.on('submit', '.save-form', function (event) {
                event.preventDefault();
                const form = $(this);
                const button = form.find('.save-button');
                const articleData = form.serialize();

                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: 'https://bidnews.org/admin/post/save',
                    data: articleData,
                    success: function (response) {
                        handleSaveSuccess(response, button);
                    },
                    error: function (xhr, status, errorThrown) {
                        handleSaveError(errorThrown, button);
                    }
                });
            });

            function handleSaveSuccess(response, button) {
                console.log('Статья успешно сохранена');
                console.log(response);
                button.removeClass('btn-outline-secondary').addClass('completed-action btn-success').text('added');

                showNotification('success', 'Успех', 'Статья успешно сохранена.');
            }

            function handleSaveError(error, button) {
                console.error('Ошибка при сохранении статьи: ' + error);
                button.removeClass('btn-outline-secondary').addClass('btn-danger').text('error');

                showNotification('error', 'Ошибка', 'Ошибка при сохранении статьи: ' + error);
            }

            function resetButton() {
                button.removeClass('btn-success completed-action btn-block btn-warning btn-danger');
                button.addClass('btn-outline-secondary').text('Search');
            }
            resultTable.on('click', '.view-button', function () {
                const row = $(this).closest('tr');
                const articleData = {
                    publishedAt: row.find('input[name="publishedAt"]').val(),
                    title: row.find('input[name="title"]').val(),
                    description: row.find('input[name="description"]').val(),
                    content: row.find('input[name="content"]').val(),
                    url: row.find('input[name="url"]').val(),
                    urlToImage: row.find('input[name="urlToImage"]').val(),
                    author: row.find('input[name="author"]').val(),
                    // Додайте інші дані тут відповідно до вашої структури даних
                };

                // Очищаем содержимое модального окна
                modalBody.empty();

                // Создаем и добавляем контейнер в модальное окно
                const whatsNewsSingle = $('<div class="whats-news-single mb-40 mb-40">');
                const whatesImg = $('<div class="whates-img">');
                const img = $('<img>')
                    .attr('src', articleData.urlToImage)
                    .attr('alt', 'image')
                    .css('max-height', '300px');
                const formattedDate1 = moment(articleData.publishedAt).format('DD.MM.YYYY');
                const whatesCaption = $('<div class="whates-caption">');
                const titleH4 = $('<h4><a href="latest_news.html">').text(articleData.title);
                const authorSpan = $('<span>').text(articleData.author +  ' - ' + formattedDate1);
                const descriptionP = $('<p>').text(articleData.description);

                // Собираем контейнер
                whatesImg.append(img);
                whatesCaption.append(titleH4, authorSpan, descriptionP);
                whatsNewsSingle.append(whatesImg, whatesCaption);

                // Добавляем контейнер в модальное окно
                modalBody.append(whatsNewsSingle);

                // Вставляем данные о статье в другие части модального окна, если необходимо

                // Открываем модальное окно
                modal.modal('show');
            });

            $('.close-button').click(function () {
                $('#myModal3').modal('hide');
            });
        });
    </script>


@endsection
