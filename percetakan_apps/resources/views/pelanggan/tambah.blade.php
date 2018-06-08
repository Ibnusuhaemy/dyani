@extends("layout")
@section("content")

<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Form Pelanggan</h1>
    </div>
</div>
<!-- END Page Title -->

<!-- BEGIN Breadcrumb -->
<div id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <span class="divider"><i class="fa fa-angle-right"></i></span>
        </li>
        <li class="active">Form Pelanggan</li>
    </ul>
</div>
<!-- END Breadcrumb -->

<!-- BEGIN Main Content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i> Form Pelanggan</h3>
            </div>
            <div class="box-content">
                <form action="{{ url("/tambah-pelanggan") }}" class="form-horizontal" id="validation-form" method="post">
                	{{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="nama">Nama Pelanggan</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <input type="text" name="nama" id="nama" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="alamat">Alamat</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <textarea name="alamat" id="alamat" class="form-control" rows="4" data-rule-required="true"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="nomor">Nomor Telepon</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <input type="number" name="telp" id="nomor" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="nomor">Email</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <input type="text" name="email" id="email" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                            <input type="submit" class="btn btn-success" value="Submit">
                            <a class="btn" href="">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection