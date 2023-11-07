@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1617px;">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category editing</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.category.index') }}">Categories</a></li>
                            <li class="breadcrumb-item active">Category editing</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Products</h3>
                                <div class="card-tools ml-auto">
                                    <ul class="nav ml-auto p-3">
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/category/create*') ? 'active' : '' }}" href="{{ route('admin.category.create') }}"><ion-icon name="cloud-upload-outline"></ion-icon></a></li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/category/unpublished*') ? 'active' : '' }}" href="{{ route('admin.category.unpublished') }}"><ion-icon name="eye-off-outline"></ion-icon></a></li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/category') ? 'active' : '' }}" href="{{ route('admin.category.index') }}"><ion-icon name="eye-outline"></ion-icon></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group w-100">
                                        <label>Имя</label>
                                        <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ $category->name }}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <label>Имя* [eng]</label>
                                        <input type="text" class="form-control" name="idName" placeholder="Имя* [eng]" value="{{ $category->idName }}">
                                        @error('idName')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <div class="form-group">
                                            <label>Приоритет</label>
                                            <select class="form-control" name="priority_num">
                                                <option value="0" @if($category->priority_num == 0) selected @endif>0</option>
                                                <option value="1" @if($category->priority_num == 1) selected @endif>1</option>
                                                <option value="2" @if($category->priority_num == 2) selected @endif>2</option>
                                                <option value="3" @if($category->priority_num == 3) selected @endif>3</option>
                                                <option value="4" @if($category->priority_num == 4) selected @endif>4</option>
                                            </select>
                                        </div>
                                        @error('priority_num')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <div class="form-group">
                                            <label>Публикация</label>
                                            <select class="form-control" name="published">
                                                <option value="0" @if($category->published == 0) selected @endif>off</option>
                                                <option value="1" @if($category->published == 1) selected @endif>on</option>
                                            </select>
                                        </div>
                                        @error('published')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group w-50">
                                        <input type="submit" class="btn btn-outline-secondary w-100" value="Обновить">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Preview </h3>
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
