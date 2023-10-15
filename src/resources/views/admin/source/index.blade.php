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
                            <li class="breadcrumb-item active">Sources</li>
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
                                <h3 class="card-title">Sources</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.source.search') }}" class="btn btn-tool btn-sm">
                                        <ion-icon name="search-outline"></ion-icon>
                                    </a>
                                    <a href="{{ route('admin.source.index') }}" class="btn btn-tool btn-sm">
                                        <ion-icon name="folder-open-outline"></ion-icon>
                                    </a>
                                </div>
                            </div>
                            @if(isset($sources))
                            <div class="card-body table-responsive p-0">

                                <table class="table table-striped table-valign-middle" id="resultTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>idName</th>
                                        <th>Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sources as $source)
                                    <tr>
                                        <td>{{ $source->id }}</td>
                                        <td>{{ $source->idName }}</td>
                                        <td>{{ $source->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.source.index') }}" class="btn btn-tool btn-sm">
                                                <ion-icon name="search-outline"></ion-icon>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.source.delete', $source->id) }}" method="POST">
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
                            <div class="card-footer clearfix">
                                {{ $sources->links() }}
                            </div>
                                @endif
                        </div>
                    </div>


                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Categories</h3>

                            </div>
                            <div class="card-body table-responsive p-0">
                                @if(isset($categories))
                                    <table class="table table-striped table-valign-middle" id="resultTable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Категория</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $i => $category)
                                            <tr>
                                                <td class="text-center">{{ $i + 1 }}</td> <!-- Выводим номер итерации, начиная с 1 -->
                                                <td class="text-center">{{ $category }}</td> <!-- Выводим значение категории -->
                                                <td class="text-center"><a href="#" class="btn btn-tool btn-sm">
                                                        <ion-icon name="search-outline"></ion-icon>
                                                    </a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

