@extends('admin.layouts.mainlayout')

@section('title')
    Dashboard
@endsection

@section('content')

    <div class="container-fluid mt-3">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>

                <?php
                
                $nomer = 1;
                
                ?>

                @foreach ($errors->all() as $error)
                    <li>{{ $nomer++ }}. {{ $error }}</li>
                @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Products Sold</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $productssold }}</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Products</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $products }}</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Customers</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $users }}</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Categories</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $categories }}</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0 d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">Visitors Report</h4>

                                </div>

                            </div>
                            <div class="chart-wrapper">
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0 d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">Antrian Report</h4>

                                </div>

                            </div>
                            <div class="chart-wrapper">
                                <canvas id="teamChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var labelsvisitors = {!! json_encode($labelsvisitors) !!};
        var datavisitors = {!! json_encode($datavisitors) !!};
        //line chart
        var ctx = document.getElementById("lineChart");
        ctx.height = 150;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labelsvisitors,
                datasets: [{
                    label: "Jumlah Visitors",
                    borderColor: "rgba(144,	104,	190,.9)",
                    borderWidth: "1",
                    backgroundColor: "rgba(144,	104,	190,.7)",
                    data: datavisitors,
                }, ]
            },
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                }
            }
        }, );
    </script>
    <script>
        var labelskonsultasi = {!! json_encode($labelskonsultasi) !!};
        var datakonsultasi = {!! json_encode($datakonsultasi) !!};

        //Team chart
        var ctx = document.getElementById("teamChart");
        ctx.height = 150;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labelskonsultasi,
                type: 'line',
                defaultFontFamily: 'Montserrat',
                datasets: [{
                    data: datakonsultasi,
                    label: 'Antrian',
                    backgroundColor: '#A569BD',
                    borderColor: '#A569BD',
                    borderWidth: 0.5,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: '#A569BD',
                }]
            },
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#000',
                    bodyFontColor: '#000',
                    backgroundColor: '#fff',
                    titleFontFamily: 'Montserrat',
                    bodyFontFamily: 'Montserrat',
                    cornerRadius: 3,
                    intersect: false,
                },
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        fontFamily: 'Montserrat',
                    },


                },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                },
                title: {
                    display: false,
                }
            }
        });
    </script>
@endsection

@section('sweetalert')
    @if (Session::get('loginberhasil'))
        <script>
            swal("Well Done", "Anda Berhasil Login", "success");
        </script>
    @endif

    @if (Session::get('updateprofil'))
        <script>
            swal("Well Done", "Profil Berhasil Diperbarui", "success");
        </script>
    @endif

    @if (Session::get('updateprofilerror'))
        <script>
            swal("Opps!!", "Password Anda Salah", "error");
        </script>
    @endif

    @if (Session::get('passwordtidaksama'))
        <script>
            swal("Opps!!", "Konfirmasi Password Anda Salah", "error");
        </script>
    @endif

    @if (Session::get('sudahlogin'))
        <script>
            swal("Notice", "Anda Masih Login", "success");
        </script>
    @endif
@endsection
