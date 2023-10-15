@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1617px;">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Offers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                                        <li class="nav-item"><a class="btn btn-tool btn-sm d-flex align-items-center nav-link {{ request()->is('admin/user') ? 'active' : '' }}" href="{{ route('admin.user.create') }}"><ion-icon name="cloud-upload-outline"></ion-icon></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>title</th>
                                        <th>category</th>
                                    </tr>
                                    </thead>
                                    @if(isset($users))
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    {{ $user->id }}
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-tool btn-sm">
                                                        <ion-icon name="create-outline"></ion-icon>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
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
                                    @endif
                                </table>

                            </div>
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
