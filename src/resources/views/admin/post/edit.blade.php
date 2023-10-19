@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1617px;">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post editing</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.post.index') }}">Post</a></li>
                            <li class="breadcrumb-item active">Post editing</li>
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
                                        <li class="nav-item"><a class="btn btn-tool btn-sm" href="{{ route('admin.post.unpublished') }}"><ion-icon name="eye-off-outline"></ion-icon></a></li>

                                        <li class="nav-item"><a class="btn btn-tool btn-sm" href="{{ route('admin.post.index') }}"><ion-icon name="eye-outline"></ion-icon></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group w-100">
                                        <label>title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{ $post->title }}">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <label>description</label>
                                        <input type="text" class="form-control" name="description" placeholder="description" value="{{ $post->description }}">
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content">content</label>
                                        <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                        @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <label>author</label>
                                        <input type="text" class="form-control" name="author" placeholder="author" value="{{ $post->author }}">
                                        @error('author')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <div class="form-group">
                                            @if(isset($sources))
                                                <label>Source</label>
                                                <select class="form-control" name="source">
                                                    <option value="">Выберите источник</option>
                                                    @foreach($sources as $source)
                                                        <option value="{{ $source->name }}" @if($source->name == $post->source) selected @endif>{{ $source->name }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        @error('source')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <label>urlToImage</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="urlToImage" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        <div class="image_preview mt-3">
                                            <img src="{{ asset('storage/'. $post->urlToImage) }}" style="height:250px;" alt="image">
                                        </div>
                                        @error('urlToImage')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <label>url</label>
                                        <input type="text" class="form-control" name="url" placeholder="url" value="{{ $post->url }}">
                                        @error('urlToImage')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-100">
                                        <div class="form-group">
                                            <label>Priority</label>
                                            <select class="form-control" name="priority_id">
                                                <option value="0" @if($post->priority_id == 0) selected @endif>0</option>
                                                <option value="1" @if($post->priority_id == 1) selected @endif>1</option>
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
                                                    <option value="{{ $category }}" @if($category == $post->category) selected @endif>{{ $category }}</option>
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
                                                        <option value="{{ $country }}" @if($country == $post->country) selected @endif>{{ $country }}</option>
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
                                                        <option value="{{ $language }}" @if($language == $post->language) selected @endif>{{ $language }}</option>
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
                                                <option value="0" @if($post->published == 0) selected @endif>off</option>
                                                <option value="1" @if($post->published == 1) selected @endif>on</option>
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
