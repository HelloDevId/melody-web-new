@extends('admin.layouts.mainlayout')

@section('title')
    {{ $user->name }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-purple btn-sm mb-4" href="/user"><i class="fa fa-arrow-left"></i></a>
                        <h4 class="card-title">Detail User</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered zero-configuration display responsive nowrap"
                                style="width:100%">
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>No Hp</th>
                                        <td>{{ $user->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>{{ $user->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kulit</th>
                                        <td>{{ $user->kulit->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>{{ $user->tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $user->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Detail Konsultasi User</th>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table id="example" class="table table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomer Antrian</th>
                                        <th>Tanggal</th>
                                        <th>Hasil Konsultasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($datakonsultasi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->no_antrian }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>
                                                <div class="text-center">
                                                    <button type="button" class="btn mx-1 mb-1 btn-outline-light btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#detailModal{{ $data->id }}"><i
                                                            class="icon-eye menu-icon"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade bd-example-modal-lg" id="detailModal{{ $data->id }}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Detail Modal</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form>
                                                        <div class="modal-body">

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Keluhan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="name"
                                                                        value="{{ $data->keluhannama }}"
                                                                        class="form-control" placeholder="Masukkan Nama">
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Detail
                                                                    Keluhan</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" cols="30" rows="5">{{ $data->detail_keluhan }}</textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Hasil
                                                                    Konsultasi</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" cols="30" rows="5">{{ $data->hasil_konsultasi }}</textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"
                                                                data-dismiss="modal">Close</button>

                                                        </div>
                                                    </form>
                                                </div>


                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',


                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],

                buttons: [{
                        extend: 'colvis',
                        className: 'btn btn-purple btn-sm',
                        text: 'Column Visibility',
                        // columns: ':gt(0)'


                    },

                    {

                        extend: 'pageLength',
                        className: 'btn btn-purple btn-sm',
                        text: 'Page Length',
                        // columns: ':gt(0)'
                    },


                    // 'colvis', 'pageLength',

                    {
                        extend: 'excel',
                        className: 'btn btn-purple btn-sm',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },

                    // {
                    //     extend: 'csv',
                    //     className: 'btn btn-primary btn-sm',
                    //     exportOptions: {
                    //         columns: [0, ':visible']
                    //     }
                    // },
                    {
                        extend: 'pdf',
                        className: 'btn btn-purple btn-sm',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },

                    {
                        extend: 'print',
                        className: 'btn btn-purple btn-sm',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },

                    // 'pageLength', 'colvis',
                    // 'copy', 'csv', 'excel', 'print'

                ],

            });
        });
        $(document).ready(function() {
            $('#exampleaja').DataTable({
                dom: 'Bfrtip',


                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],

                buttons: [{
                        extend: 'colvis',
                        className: 'btn btn-purple btn-sm',
                        text: 'Column Visibility',
                        // columns: ':gt(0)'


                    },

                    {

                        extend: 'pageLength',
                        className: 'btn btn-purple btn-sm',
                        text: 'Page Length',
                        // columns: ':gt(0)'
                    },


                    // 'colvis', 'pageLength',

                    {
                        extend: 'excel',
                        className: 'btn btn-purple btn-sm',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },

                    // {
                    //     extend: 'csv',
                    //     className: 'btn btn-primary btn-sm',
                    //     exportOptions: {
                    //         columns: [0, ':visible']
                    //     }
                    // },
                    {
                        extend: 'pdf',
                        className: 'btn btn-purple btn-sm',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },

                    {
                        extend: 'print',
                        className: 'btn btn-purple btn-sm',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },

                    // 'pageLength', 'colvis',
                    // 'copy', 'csv', 'excel', 'print'

                ],

            });
        });
    </script>
@endsection
