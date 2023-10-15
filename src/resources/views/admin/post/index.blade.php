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
                            <li class="breadcrumb-item active">Posts</li>
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
                            <div class="card-header border-0 d-flex ">
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
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>title</th>
                                        <th>category</th>
                                    </tr>
                                    </thead>
                                    @if(isset($posts))
                                    <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>
                                            {{ $post->id }}
                                        </td>
                                        <td>
                                            {!! $post->title !!}
                                        </td>
                                        <td>
                                            {{ $post->category }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-tool btn-sm">
                                                <ion-icon name="create-outline"></ion-icon>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
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
                                {{ $posts->links() }}
                            </div>
                            @endif
                        </div>

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
