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
    </div>
@endsection

@section('script')
    <script>
        var labels = {!! json_encode($labels) !!};
        var data = {!! json_encode($data) !!};
        //line chart
        var ctx = document.getElementById("lineChart");
        ctx.height = 150;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: "Jumlah Visitors",
                    borderColor: "rgba(144,	104,	190,.9)",
                    borderWidth: "1",
                    backgroundColor: "rgba(144,	104,	190,.7)",
                    data: data,
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
