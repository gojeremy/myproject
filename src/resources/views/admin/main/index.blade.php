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
                                    <h3 class="card-title">Analytics</h3>
                                    <a href="javascript:void(0);">go to matomo</a>
                                </div>
                            </div>
                            <div class="card-body" style="height: 1000px;">
                                <iframe src="https://gojeremyyoutub0.matomo.cloud/index.php?module=Widgetize&action=iframe&moduleToWidgetize=Dashboard&actionToWidgetize=index&idSite=1&period=week&date=yesterday&token_auth=" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="100%"></iframe>

                            </div>
                        </div>



                    </div>



                </div>

            </div>

        </div>

    </div>
@endsection
