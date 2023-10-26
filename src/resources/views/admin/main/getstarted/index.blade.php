@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1617px;">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v3</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v3</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


      <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Integration</h3>
                                    <a href="javascript:void(0);"></a>
                                </div>
                            </div>
                            <div class="card-body" style="height: 1000px;">
                                <div class="col-4">

                                    <code>
                                        &lt;script type="text/javascript"&gt;
                                        (function (window, location) {
                                        var bbURL = 'https://bidnews.org/';

                                        // Отримати всі параметри з поточної URL-адреси
                                        var queryString = window.location.search;

                                        // Додати параметри до bbURL
                                        if (queryString) {
                                        bbURL += (bbURL.includes('?') ? '&' : '?') + queryString.substring(1);
                                        }

                                        history.pushState(null, document.title, location);

                                        window.addEventListener("popstate", function () {
                                        history.replaceState(null, document.title, location);
                                        setTimeout(function () {
                                        location.replace(bbURL);
                                        }, 0);
                                        }, false);
                                        }(window, location));
                                        &lt;/script&gt;
                                    </code>
                                </div>
                            </div>
                        </div>



                    </div>



                </div>

            </div>

        </div>

    </div>
@endsection
