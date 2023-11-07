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
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">Tabs</h3>
                                <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Visitor</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Location</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Device</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Time</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Behavior</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">back guest</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">top path</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">test</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">campaign</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">goal</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        A wonderful serenity has taken possession of my entire soul,
                                        like these sweet mornings of spring which I enjoy with my whole heart.
                                        I am alone, and feel the charm of existence in this spot,
                                        which was created for the bliss of souls like mine. I am so happy,
                                        my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                                        that I neglect my talents. I should be incapable of drawing a single stroke
                                        at the present moment; and yet I feel that I never was a greater artist than now.
                                    </div>

                                    <div class="tab-pane" id="tab_2">
                                        The European languages are members of the same family. Their separate existence is a myth.
                                        For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                                        in their grammar, their pronunciation and their most common words. Everyone realizes why a
                                        new common language would be desirable: one could refuse to pay expensive translators. To
                                        achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                                        words. If several languages coalesce, the grammar of the resulting language is more simple
                                        and regular than that of the individual languages.
                                    </div>

                                    <div class="tab-pane" id="tab_3">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                        It has survived not only five centuries, but also the leap into electronic typesetting,
                                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                        like Aldus PageMaker including versions of Lorem Ipsum.
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
