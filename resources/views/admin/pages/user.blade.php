@extends('admin.layouts.mainlayout')

@section('title')
    Data User
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
                        <form action="/user-delete" method="POST">
                            @csrf
                            <div class="modal fade" id="hapusModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            Anda Yakin Akan Menghapus Data ?

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            <button type="button" class="btn btn-primary"
                                                data-dismiss="modal">Close</button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title">Data User</h4>
                            <div class="align-right text-right">
                                <button data-toggle="modal" data-target="#addModal" type="button"
                                    class="btn mb-1 btn-rounded btn-outline-primary btn-sm ms-auto">Add</button>
                                <button type="button" class="btn mb-1 btn-rounded btn-outline-danger btn-sm ms-auto"
                                    data-toggle="modal" data-target="#hapusModal">Delete</button>
                                <a href="/user-restore"
                                    class="btn mb-1 btn-rounded btn-outline-warning btn-sm ms-auto">Terhapus</a>

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
                                <table id="example"
                                    class="table table-bordered zero-configuration display responsive nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $no = 1;
                                        
                                        ?>
                                        @foreach ($user as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <img class="rounded-circle"
                                                        src="{{ asset('foto/user/' . $data['image']) }}" height="40"
                                                        width="40" alt="">
                                                </td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>
                                                    <div class="text-center">
                                                        {{-- <button type="button"
                                                            class="btn mx-1 mb-1 btn-outline-light btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#detailModal{{ $data->id }}"><i
                                                                class="icon-eye menu-icon"></i></button> --}}
                                                        <a href="/user-detail/{{ $data->id }}"
                                                            class="btn mx-1 mb-1 btn-outline-light btn-sm"><i
                                                                class="icon-eye menu-icon"></i></a>
                                                        <button type="button"
                                                            class="btn mx-1 mb-1 btn-outline-light btn-sm"
                                                            data-toggle="modal" data-target="#editModal{{ $data->id }}">
                                                            <i
                                                                class="icon-pencil
                                                        menu-icon"></i></button>

                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name="ids[{{ $data->id }}]" id="delete"
                                                        value="{{ $data->id }}">
                                                </td>

                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade bd-example-modal-lg"
                                                id="detailModal{{ $data->id }}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Modal</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">No Hp</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" value="{{ $data->no_hp }}"
                                                                            class="form-control"
                                                                            placeholder="Masukkan No Hp">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Jenis
                                                                        Kelamin</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text"
                                                                            value="@if ($data->jenis_kelamin == 'L') Laki-Laki @else Perempuan @endif"
                                                                            class="form-control" placeholder="Tag">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Jenis
                                                                        Kulit</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text"
                                                                            value="{{ $data->kulit->name }}"
                                                                            class="form-control" placeholder="Tag">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Tanggal
                                                                        Lahir</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="date"
                                                                            value="{{ $data->tanggal_lahir }}"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Password">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" cols="30" rows="5">{{ $data->alamat }}</textarea>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"
                                                                data-dismiss="modal">Close</button>

                                                        </div>
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
                                                        <form action="/user-delete/{{ $data->id }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="modal-body">

                                                                Anda Yakin Akan Menghapus Data {{ $data->name }} ?

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-dismiss="modal">Close</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade bd-example-modal-lg"
                                                id="editModal{{ $data->id }}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Modal</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/user-edit/{{ $data->id }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Image</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" name="image"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="name"
                                                                            value="{{ $data->name }}"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Nama">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="email"
                                                                            value="{{ $data->email }}"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Email">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">No Hp</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="no_hp"
                                                                            value="{{ $data->no_hp }}"
                                                                            class="form-control"
                                                                            placeholder="Masukkan No Hp">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Jenis
                                                                        Kelamin</label>
                                                                    <div class="col-sm-10">
                                                                        <select name="jenis_kelamin" class="form-control">
                                                                            <option value="">-- Pilih Jenis Kelamin
                                                                                --</option>
                                                                            <option value="L"
                                                                                @if ($data->jenis_kelamin == 'L') selected @endif>
                                                                                Laki-Laki</option>
                                                                            <option value="P"
                                                                                @if ($data->jenis_kelamin == 'P') selected @endif>
                                                                                Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Jenis
                                                                        Kulit</label>
                                                                    <div class="col-sm-10">
                                                                        <select name="id_kulit" class="form-control">
                                                                            <option selected
                                                                                value="{{ $data->id_kulit }}">
                                                                                {{ $data->kulit->name }}</option>

                                                                            @foreach ($jeniskulit as $datass)
                                                                                <option value="{{ $datass->id }}">
                                                                                    {{ $datass->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" name="alamat" cols="30" rows="5">{{ $data->alamat }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Tanggal
                                                                        Lahir</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="date" name="tanggal_lahir"
                                                                            value="{{ $data->tanggal_lahir }}"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Password">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Password</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" name="password"
                                                                            value="" class="form-control"
                                                                            placeholder="Masukkan Password">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-2 col-form-label">Repassword</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" name="repassword"
                                                                            value="" class="form-control"
                                                                            placeholder="Masukkan Re-Password">
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary"
                                                                    type="submit">Save</button>
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
                                    <form action="/user-add" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="modal-body">

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Masukkan Nama">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="email" class="form-control"
                                                        placeholder="Masukkan Email">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">No Hp</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="no_hp" value=""
                                                        class="form-control" placeholder="Masukkan No Hp">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Jenis
                                                    Kelamin</label>
                                                <div class="col-sm-10">
                                                    <select name="jenis_kelamin" class="form-control">
                                                        <option value="">-- Pilih Jenis Kelamin--</option>
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Jenis
                                                    Kulit</label>
                                                <div class="col-sm-10">
                                                    <select name="id_kulit" class="form-control">
                                                        <option value="">-- Pilih Jenis Kulit --</option>

                                                        @foreach ($jeniskulit as $datass)
                                                            <option value="{{ $datass->id }}">
                                                                {{ $datass->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="alamat" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tanggal
                                                    Lahir</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="tanggal_lahir" value=""
                                                        class="form-control" placeholder="Masukkan Password">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" value=""
                                                        class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Repassword</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="repassword" value=""
                                                        class="form-control" placeholder="Re-Password">
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
    @if (Session::get('faildel'))
        <script>
            swal("Gagal Hapus", "Pilih Data Yang Akan Dihapus", "error");
        </script>
    @endif
@endsection
