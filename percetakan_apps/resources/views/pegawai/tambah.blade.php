@extends("layout")
@section("content")

<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Form Pegawai</h1>
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
        <li class="active">Form Pegawai</li>
    </ul>
</div>
<!-- END Breadcrumb -->

<!-- BEGIN Main Content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i> Form Pegawai</h3>
            </div>
            <div class="box-content">
                <form action="{{ url("/pegawai") }}" class="form-horizontal" id="validation-form" method="post">
                	{{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="nama">Nama Pegawai</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <input type="text" name="nama" id="nama" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="email">Email</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <input type="text" name="email" id="email" class="form-control" rows="4" data-rule-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="nomor">Type</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <select class="form-control" name="type">
                                <option value="admin">Admin</option>
                                <option value="cs">CS</option>
                                <option value="produksi">Produksi</option>
                                <option value="supervisor">Supervisor</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="posisi">Password</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <input type="password" name="password" id="password" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="posisi">Ulangi Password</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <input type="password" name="ulangi_password" id="ulangi_password" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection