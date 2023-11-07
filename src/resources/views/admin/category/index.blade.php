@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1617px;">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категории</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Категории</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9">
                        @if(isset($categories))
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title"></h3>
                                <div class="card-tools ml-auto">
                                    <ul class="nav ml-auto p-3">
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/category/create*') ? 'active' : '' }}" href="{{ route('admin.category.create') }}"><ion-icon name="cloud-upload-outline"></ion-icon></a></li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/category/unpublished*') ? 'active' : '' }}" href="{{ route('admin.category.unpublished') }}"><ion-icon name="eye-off-outline"></ion-icon></a></li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/category') ? 'active' : '' }}" href="{{ route('admin.category.index') }}"><ion-icon name="eye-outline"></ion-icon></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Имя</th>
                                        <th>Имя* [eng]</th>
                                        <th>Приоритет</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $category->id }}
                                        </td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            {{ $category->idName }}
                                        </td>
                                        <td>
                                            {{ $category->priority_num }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-tool btn-sm">
                                                <ion-icon name="create-outline"></ion-icon>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.category.delete', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-tool btn-sm">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">


                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Filters</h3>
                                    <p>[soon]</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">

                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
