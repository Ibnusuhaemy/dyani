@extends("layout")
@section("content")
<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Tabel Karyawan</h1>
    </div>
</div>
<!-- END Page Title -->

<!-- BEGIN Breadcrumb -->
<div id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ url("/") }}">Home</a>
            <span class="divider"><i class="fa fa-angle-right"></i></span>
        </li>
        <li class="active">Tabel Karyawan</li>
    </ul>
</div>
<!-- END Breadcrumb -->

<!-- BEGIN Main Content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-table"></i> Tabel Karyawan</h3>
            </div>
            <div class="box-content">
                <a href="{{ url("/tambah-pegawai") }}" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>
                <hr>
                <div class="table-responsive" style="border:0;">
                    <table class="table table-advance" id="table1">
                        <thead>
                            <tr>
                            <th>Nama Karyawan</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $pegawai)

                            <tr>
                                <td>{{ ucwords($pegawai->name) }}</td>
                                <td>{{ $pegawai->email }}</td>
                                <td>{{ $pegawai->type }}</td>
                                <td>
                                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#detail_pegawai" data-name="{{ $pegawai->name }}" data-email="{{ $pegawai->email }}" data-type="{{ $pegawai->type }}"><i class="fa fa-cog"></i> Detail</a>
                                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#reset_password" data-id="{{ $pegawai->id }}" data-name="{{ ucwords($pegawai->name) }}"><i class="fa fa-unlock-alt"></i> Reset Password</a>
                                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#update_pegawai" data-name="{{ $pegawai->name }}" data-email="{{ $pegawai->email }}" data-type="{{ $pegawai->type }}" data-id="{{ $pegawai->id }}"><i class="fa fa-external-link"></i> Edit</a>
                                    {{-- <a href="{{ url("hapus-pegawai/".$pegawai->id) }}" class="btn btn-success"><i class="fa fa-eraser"></i> Hapus</a> --}}
                                </td>
                            </tr>

                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<div id="detail_pegawai" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="myModalLabel1">Detail Data Pegawai</h3>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">Nama: </div>
                            <div class="col-sm-8 col-md-9"><span id="detail_nama"></span></div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">Email: </div>
                            <div class="col-sm-8 col-md-9"><span id="detail_email"></span></div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">Type: </div>
                            <div class="col-sm-8 col-md-9"><span id="detail_type"></span></div>
                        </div>
                        <hr/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
</div>

<div id="update_pegawai" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url("/update-pegawai") }}" method="post">
                <input type="hidden" name="id">
            {{ csrf_field() }}
            <div class="modal-header">
                <h3 id="myModalLabel1">Update Data Pegawai</h3>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                   <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="nama">Nama:</label>
                        <div class="col-sm-6 col-lg-4 controls">
                            <input type="text" name="nama" id="nama" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="email">Email:</label>
                        <div class="col-sm-6 col-lg-4 controls">
                            <input type="text" name="email" id="email" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="satuan">Type:</label>
                        <div class="col-sm-6 col-lg-4 controls">
                            <select class="form-control" name="type">
                                <option value="admin">Admin</option>
                                <option value="cs">CS</option>
                                <option value="produksi">Produksi</option>
                                <option value="supervisor">Supervisor</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-success" aria-hidden="true">Simpan</button>
            </div>
            </form>

        </div>
    </div>
</div>

<div id="reset_password" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
           
            <div class="modal-header">
                <h3 id="myModalLabel1">Reset Password</h3>
            </div>
            <div class="modal-body">
                <h4>Apakah yakin akan me-reset password <strong><span id="nama"></span></strong>?</h4>
                        
                    
            </div>
            <form action="{{ url("/reset-password") }}" method="post">
                <input type="hidden" name="id">
                {{ csrf_field() }}
            <div class="modal-footer">
                <small class="pull-left">Setelah reset, password akan berubah ke password default : <strong>123456</strong></small>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-success" aria-hidden="true">Reset</button>
            </div>
            </form>

        </div>
    </div>
</div>
@endsection

@section("style")
<link rel="stylesheet" href="{{ asset("assets/data-tables/bootstrap3/dataTables.bootstrap.css") }}">
@endsection

@section("script")
<script type="text/javascript" src="{{ asset("assets/data-tables/jquery.dataTables.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/data-tables/bootstrap3/dataTables.bootstrap.js") }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#detail_pegawai").on("show.bs.modal", function (event) {
                const pegawai = $(event.relatedTarget);
                var nama = pegawai.data("name");
                var email = pegawai.data("email");
                var type = pegawai.data("type");

                $("#detail_nama").text(nama);    
                $("#detail_email").text(email);    
                $("#detail_type").text(type);   
                
            });

        $("#update_pegawai").on("show.bs.modal", function (event) {
                const pegawai = $(event.relatedTarget);

                var pegawai_id = pegawai.data("id");
                var nama = pegawai.data("name");
                var email = pegawai.data("email");
                var type = pegawai.data("type");

                $("input[name='nama']").val(nama);    
                $("input[name='id']").val(pegawai_id);    
                $("input[name='email']").val(email);    
                $("select[name='type']").val(type);
                
            });

        $("#reset_password").on("show.bs.modal", function (event) {
                const pegawai = $(event.relatedTarget);

                var pegawai_id = pegawai.data("id");
                var nama = pegawai.data("name");

                $("span#nama").text(nama);    
                $("input[name='id']").val(pegawai_id);
                
            });
    });
</script>
@endsection