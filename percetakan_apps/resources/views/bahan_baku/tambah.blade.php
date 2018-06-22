@extends("layout")
@section("content")
<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Form Bahan Baku</h1>
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
        <li class="active">Form Bahan Baku</li>
    </ul>
</div>
<!-- END Breadcrumb -->

<!-- BEGIN Main Content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i> Form Bahan Baku</h3>
            </div>
            <div class="box-content">
                <form action="{{ url("bahan-baku") }}" class="form-horizontal" id="validation-form" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="nama">Nama Bahan Baku:</label>
                        <div class="col-sm-6 col-lg-4 controls">
                            <input type="text" name="nama" id="nama" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="nomor">Qty:</label>
                        <div class="col-sm-6 col-lg-4 controls">
                            <input type="number" name="qty" id="nomor" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="jenis">Satuan:</label>
                        <div class="col-sm-6 col-lg-4 controls">
                            <input type="text" name="satuan" id="jenis" class="form-control" data-rule-required="true"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="jenis">Harga Beli:</label>
                        <div class="col-sm-6 col-lg-4 controls">
                            <input type="number" name="harga_beli" id="jenis" class="form-control" data-rule-required="true" min="1" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="jenis">Harga Jual:</label>
                        <div class="col-sm-6 col-lg-4 controls">
                            <input type="number" name="harga_jual" id="jenis" class="form-control" data-rule-required="true" data-rule-minlength="3" min="1" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <a class="btn" href="tbahan.html">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection