@extends("layout")
@section("content")

<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Form Produk</h1>
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
        <li class="active">Form Produk</li>
    </ul>
</div>
<!-- END Breadcrumb -->

<!-- BEGIN Main Content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i> Form Produk</h3>
            </div>
            <div class="box-content">
                <form action="{{ url("/produk") }}" class="form-horizontal" id="validation-form" method="post">
                	{{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="nama">Nama Produk</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <input type="text" name="nama" id="nama" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="satuan">Satuan</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <input type="text" name="satuan" id="satuan" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="harga_satuan">Harga Satuan</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="deskripsi">Deskripsi</label>
                        <div class="col-sm-6 col-lg-6 controls">
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" data-rule-required="true"></textarea>
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