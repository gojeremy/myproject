@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1617px;">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Offer editing</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.offer.index') }}">Offers</a></li>
                            <li class="breadcrumb-item active">Offer editing</li>
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
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/offer/create*') ? 'active' : '' }}" href="{{ route('admin.offer.create') }}"><ion-icon name="cloud-upload-outline"></ion-icon></a></li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/offer/unpublished*') ? 'active' : '' }}" href="{{ route('admin.offer.unpublished') }}"><ion-icon name="eye-off-outline"></ion-icon></a></li>
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/offer') ? 'active' : '' }}" href="{{ route('admin.offer.index') }}"><ion-icon name="eye-outline"></ion-icon></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <form action="{{ route('admin.offer.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group w-100">
                                        <label>title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{ $offer->title }}">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content">content</label>
                                        <textarea id="summernote" name="content">{{ $offer->content }}</textarea>
                                        @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content">urlToImage</label>
                                        <input type="text" class="form-control" name="urlToImage" placeholder="urlToImage" value="{{ $offer->urlToImage }}">
                                        @error('urlToImage')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content">url</label>
                                        <input type="text" class="form-control" name="url" placeholder="url" value="{{ $offer->url }}">
                                        @error('url')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <div class="form-group">
                                            <label>Priority</label>
                                            <select class="form-control" name="priority_id">
                                                <option value="0" @if($offer->priority_id == 0) selected @endif>0</option>
                                                <option value="1" @if($offer->priority_id == 1) selected @endif>1</option>
                                            </select>
                                        </div>
                                        @error('priority_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <div class="form-group">
                                            @if(isset($categories))
                                                <label>Category</label>
                                                <select class="form-control" name="category">
                                                    <option value="">Выберите категорию</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category }}" @if($category == $offer->category) selected @endif>{{ $category }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        @error('category')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <div class="form-group">
                                            @if(isset($countries))
                                                <label>Country</label>
                                                <select class="form-control" name="country">
                                                    <option value="">Выберите гео</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country }}" @if($country == $offer->country) selected @endif>{{ $country }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        @error('country')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <div class="form-group">
                                            @if(isset($languages))
                                                <label>Languages</label>
                                                <select class="form-control" name="language">
                                                    <option value="">Выберите язык</option>
                                                    @foreach($languages as $language)
                                                        <option value="{{ $language }}" @if($language == $offer->language) selected @endif>{{ $language }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        @error('country')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-50">
                                        <div class="form-group">
                                            <label for="published">published</label>
                                            <select name="published" id="" class="form-control">
                                                <option value="0" @if($offer->published == 0) selected @endif>off</option>
                                                <option value="1" @if($offer->published == 1) selected @endif>on</option>
                                            </select>

                                        </div>
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
