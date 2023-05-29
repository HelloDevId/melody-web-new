@extends('admin.layouts.mainlayout')

@section('title')
    Data Konsultasi
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Konsultasi</h4>
                        <div class="align-right text-right">
                            <button data-toggle="modal" data-target="#addModal" type="button"
                                class="btn mb-1 btn-rounded btn-outline-primary btn-sm ms-auto">Add</button>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                                </button>


                                <?php
                                
                                $nomer = 1;
                                
                                ?>

                                @foreach ($errors->all() as $error)
                                    <li>{{ $nomer++ }}. {{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered zero-configuration display responsive nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomer Antrian</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    $no = 1;
                                    
                                    ?>
                                    @foreach ($konsultasi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->antrian->no_antrian }}</td>
                                            <td>{{ $data->antrian->user->name }}</td>
                                            <td>{{ $data->antrian->tanggal }}</td>
                                            <td>
                                                <div class="text-center">
                                                    <button type="button" class="btn mx-1 mb-1 btn-outline-light btn-sm"
                                                        data-toggle="modal" data-target="#detailModal{{ $data->id }}"><i
                                                            class="icon-eye menu-icon"></i></button>
                                                    <button type="button" class="btn mx-1 mb-1 btn-outline-light btn-sm"
                                                        data-toggle="modal" data-target="#editModal{{ $data->id }}">
                                                        <i
                                                            class="icon-pencil
                                                            menu-icon"></i></button>

                                                    <button type="button" class="btn mx-1 mb-1 btn-outline-light btn-sm"
                                                        data-toggle="modal" data-target="#hapusModal{{ $data->id }}"> <i
                                                            class="icon-trash
                                                        menu-icon"></i></button>
                                                </div>
                                            </td>

                                        </tr>
                                        <!-- Modal -->
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
                                                                        value="{{ $data->antrian->keluhan->name }}"
                                                                        class="form-control" placeholder="Masukkan Nama">
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Detail
                                                                    Keluhan</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" cols="30" rows="5">{{ $data->antrian->detail_keluhan }}</textarea>
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
                                        <div class="modal fade" id="hapusModal{{ $data->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal Delete</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>

                                                    <form action="/konsultasi-delete/{{ $data->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-body">

                                                            Anda Yakin Akan Menghapus Data ?

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <button type="button" class="btn btn-primary"
                                                                data-dismiss="modal">Close</button>

                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade bd-example-modal-lg" id="editModal{{ $data->id }}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Modal</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/konsultasi-edit/{{ $data->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Hasil
                                                                    Konsultasi</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" name="hasil_konsultasi" cols="30" rows="5">{{ $data->hasil_konsultasi }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary" type="submit">Save</button>
                                                            <button type="button" class="btn btn-danger"
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
                        </form>

                        {{-- Modal Add --}}
                        <div class="modal fade bd-example-modal-lg" id="addModal">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Modal</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <form action="/konsultasi-add" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="modal-body">

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Antrian</label>
                                                <div class="col-sm-10">
                                                    <select name="id_antrian" class="form-control js-example-basic-single"
                                                        id="single-select-add" style="width:100%">
                                                        <option selected value="">Pilih Nomer Antrian</option>
                                                        @foreach ($antrian as $datass)
                                                            <option value="{{ $datass->id }}">
                                                                {{ $datass->no_antrian }} - {{ $datass->tanggal }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            \
                                            {{-- 
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Antrian</label>
                                                <div class="col-sm-10">
                                                    <select name="id_antrian" class="form-control">
                                                        <option value="">Pilih Nomer Antrian</option>
                                                        @foreach ($antrian as $datass)
                                                            <option value="{{ $datass->id }}">Nomer Antrian
                                                                {{ $datass->no_antrian }} - Tanggal {{ $datass->tanggal }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Hasil Konsultasi</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="hasil_konsultasi" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </form>
                                </div>
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
    </script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection

@section('sweetalert')
    @if (Session::get('update'))
        <script>
            swal("Done", "Data Berhasil Diupdate", "success");
        </script>
    @endif
    @if (Session::get('restore'))
        <script>
            swal("Done", "Data Berhasil Dipulihkan", "success");
        </script>
    @endif
    @if (Session::get('delete'))
        <script>
            swal("Done", "Data Berhasil Dihapus", "success");
        </script>
    @endif
    @if (Session::get('create'))
        <script>
            swal("Done", "Data Berhasil Ditambahkan", "success");
        </script>
    @endif
    @if (Session::get('sudahada'))
        <script>
            swal("Gagal", "Data Sudah Ada", "error");
        </script>
    @endif
    @if (Session::get('gagal'))
        <script>
            swal("Gagal Hapus", "Data Masih Terelasi", "error");
        </script>
    @endif

    @if (Session::get('loginberhasil'))
        <script>
            swal("Well Done", "Anda Berhasil Login", "success");
        </script>
    @endif
    @if (Session::get('sudahlogin'))
        <script>
            swal("Notice", "Anda Masih Login", "success");
        </script>
    @endif
@endsection
