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
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Dashboard v3</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div id="widgetIframe"><iframe width="100%" height="750px" src="https://gojeremyyoutub0.matomo.cloud/index.php?module=Widgetize&action=iframe&containerId=VisitOverviewWithGraph&disableLink=1&widget=1&moduleToWidgetize=CoreHome&actionToWidgetize=renderWidgetContainer&idSite=1&period=day&date=yesterday" scrolling="0" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
                        </div>


                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div id="widgetIframe"><iframe width="100%" height="250" src="https://gojeremyyoutub0.matomo.cloud/index.php?module=Widgetize&action=iframe&disableLink=1&widget=1&moduleToWidgetize=Live&actionToWidgetize=getSimpleLastVisitCount&idSite=1&period=day&date=yesterday" scrolling="0" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
                        </div>
                        <div class="card">
                            <div id="widgetIframe"><iframe width="100%" height="400" src="https://gojeremyyoutub0.matomo.cloud/index.php?module=Widgetize&action=iframe&disableLink=1&widget=1&moduleToWidgetize=UserCountryMap&actionToWidgetize=realtimeMap&idSite=1&period=day&date=yesterday" scrolling="0" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>

                    </div>

        </div>

            </div>
    </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div id="widgetIframe"><iframe width="100%" height="550" src="https://gojeremyyoutub0.matomo.cloud/index.php?module=Widgetize&action=iframe&disableLink=1&widget=1&moduleToWidgetize=Cohorts&actionToWidgetize=getCohorts&idSite=1&period=day&date=yesterday" scrolling="0" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
