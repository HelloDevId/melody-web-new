@extends('admin.layouts.mainlayout')

@section('title')
    Data Antrian
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
                        <h4 class="card-title">Data Antrian</h4>
                        <div class="align-right text-right">
                            <button data-toggle="modal" data-target="#addModal" type="button"
                                class="btn mb-1 btn-rounded btn-outline-primary btn-sm ms-auto">Add</button>
                            {{-- <a href="/kategori-restore"
                                class="btn mb-1 btn-rounded btn-outline-warning btn-sm ms-auto">Terhapus</a> --}}
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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    $no = 1;
                                    
                                    ?>
                                    @foreach ($antrian as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->no_antrian }}</td>
                                            <td>{{ $data->user->name }}</td>

                                            <td>{{ $data->tanggal }}</td>
                                            <td>
                                                @if ($data->status == 'Belum Selesai')
                                                    <span class="badge badge-danger">{{ $data->status }}</span>
                                                @else
                                                    <span class="badge badge-success">{{ $data->status }}</span>
                                                @endif
                                            </td>
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
                                                        data-toggle="modal" data-target="#hapusModal{{ $data->id }}">
                                                        <i
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
                                                                        value="{{ $data->keluhan->name }}"
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


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"
                                                                data-dismiss="modal">Close</button>

                                                        </div>
                                                    </form>
                                                </div>


                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="hapusModal{{ $data->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal Delete</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>

                                                    <form action="/antrian-delete/{{ $data->id }}" method="POST">
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
                                                    <form action="/antrian-edit/{{ $data->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Pilih User</label>
                                                                <div class="col-sm-10">
                                                                    <select disabled name="id_user"
                                                                        class="form-control js-example-basic-single"
                                                                        id="single-select-add" style="width:100%">
                                                                        @if ($data->id_user == '')
                                                                            <option value="{{ $data->id_user }}" selected>
                                                                                {{ $data->user->name }}</option>
                                                                        @endif
                                                                        @foreach ($datauser as $datas)
                                                                            <option value="{{ $datas->id }}">
                                                                                {{ $datas->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Keluhan</label>
                                                                <div class="col-sm-10">
                                                                    <select name="id_keluhan" class="form-control">
                                                                        <option selected value="{{ $data->keluhan->id }}">
                                                                            {{ $data->keluhan->name }}</option>

                                                                        @foreach ($datakeluhan as $datass)
                                                                            <option value="{{ $datass->id }}">
                                                                                {{ $datass->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Detail
                                                                    Keluhan</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" name="detail_keluhan" cols="30" rows="5">{{ $data->detail_keluhan }}</textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                                                <div class="col-sm-10">
                                                                    <input disabled type="date" name="tanggal"
                                                                        value="{{ $data->tanggal }}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Status</label>
                                                                <div class="col-sm-10">
                                                                    <select name="status" class="form-control">
                                                                        @if ($data->status == 'Belum Selesai')
                                                                            <option value="Belum Selesai" selected>
                                                                                Belum Selesai</option>
                                                                            <option value="Selesai">Selesai</option>
                                                                        @else
                                                                            <option selected value="Selesai">Selesai
                                                                            </option>
                                                                            <option value="Belum Selesai">Belum
                                                                                Selesai
                                                                            </option>
                                                                        @endif
                                                                    </select>
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
                                    <form action="/antrian-add" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="modal-body">

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Pilih User</label>
                                                <div class="col-sm-10">
                                                    <select name="id_user" class="form-control js-example-basic-single"
                                                        id="single-select-add" style="width:100%">
                                                        <option selected value="">Pilih User</option>
                                                        @foreach ($datauser as $datas)
                                                            <option value="{{ $datas->id }}">
                                                                {{ $datas->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Keluhan</label>
                                                <div class="col-sm-10">
                                                    <select name="id_keluhan" class="form-control">
                                                        {{-- <option selected value="{{ $data->keluhan->id }}">
                                                            {{ $data->keluhan->name }}</option> --}}
                                                        <option value="">Pilih Keluhan</option>

                                                        @foreach ($datakeluhan as $datass)
                                                            <option value="{{ $datass->id }}">
                                                                {{ $datass->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Detail
                                                    Keluhan</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="detail_keluhan" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="tanggal" value=""
                                                        class="form-control">
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
            swal("Gagal", "Anda Sudah Membuat Antrian", "error");
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
