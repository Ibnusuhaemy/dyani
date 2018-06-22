@extends("layout")

@section("content")

<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Tabel Produk</h1>
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
        <li class="active">Tabel Produk</li>
    </ul>
</div>
<!-- END Breadcrumb -->

<!-- BEGIN Main Content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-table"></i> Tabel Produk</h3>
            </div>
            <div class="box-content">
                <a href="{{ url("/tambah-produk") }}" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>
                <hr>
                <div class="table-responsive" style="border:0;">
                    <table class="table table-advance" id="table1">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@php
                        	$i=1;
                        	@endphp
                        	@foreach($produk as $produk)
                        	<tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ ucwords($produk->nama) }}</td>
                                <td>{{ $produk->satuan }}</td>
                                <td>{{ $produk->harga_satuan }}</td>
                                <td>
                                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#detail_produk" data-nama="{{ ucwords($produk->nama) }}" data-satuan="{{ $produk->satuan }}" data-harga_satuan="{{ $produk->harga_satuan }}" data-deskripsi="{{ $produk->deskripsi }}"><i class="fa fa-cog"></i> Detail</a>
                                    <a class="btn btn-success" href="#"  data-toggle="modal" data-target="#update_produk"  data-nama="{{ ucwords($produk->nama) }}" data-satuan="{{ $produk->satuan }}" data-harga_satuan="{{ $produk->harga_satuan }}" data-id="{{ $produk->id }}" data-deskripsi="{{ $produk->deskripsi }}"><i class="fa fa-external-link"></i> Edit</a>
                                    <a href="{{ url("/hapus-produk/".$produk->id) }}" class="btn btn-success"><i class="fa fa-eraser"></i> Hapus</a>
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

@section("modal")
<div id="detail_produk" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="myModalLabel1">Detail Data produk</h3>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">Nama : </div>
                            <div class="col-sm-8 col-md-9"><span id="detail_nama"></span></div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">Satuan : </div>
                            <div class="col-sm-8 col-md-9"><span id="detail_satuan"></span></div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">Harga : </div>
                            <div class="col-sm-8 col-md-9"><span id="detail_harga_satuan"></span></div>
                        </div>

                        <hr/>
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">Deskripsi : </div>
                            <div class="col-sm-8 col-md-9"><span id="detail_deskripsi"></span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
</div>

<div id="update_produk" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form action="{{ url("/update-produk") }}" method="post">
        		<input type="hidden" name="id">
            {{ csrf_field() }}
        	<div class="modal-header">
                <h3 id="myModalLabel1">Update Data Produk</h3>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Nama: </div>
                        <div class="col-sm-8 col-md-9"><input type="text" class="form-control" name="nama" value=""></div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Satuan: </div>
                        <div class="col-sm-8 col-md-9"><input type="text" name="satuan" class="form-control"></div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Harga Satuan: </div>
                        <div class="col-sm-8 col-md-9"><input type="text" class="form-control" name="harga_satuan"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Deskripsi: </div>
                        <div class="col-sm-8 col-md-9">
                        	<textarea class="form-control" name="deskripsi" cols="5" rows="5"></textarea>
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
@endsection

@section("style")
<link rel="stylesheet" href="{{ asset("assets/data-tables/bootstrap3/dataTables.bootstrap.css") }}">
@endsection

@section("script")
<script type="text/javascript" src="{{ asset("assets/data-tables/jquery.dataTables.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/data-tables/bootstrap3/dataTables.bootstrap.js") }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#detail_produk").on("show.bs.modal", function (event) {
                const produk = $(event.relatedTarget);
                var nama = produk.data("nama");
                var satuan = produk.data("satuan");
                var harga_satuan = produk.data("harga_satuan");
                var deskripsi = produk.data("deskripsi");

                $("#detail_nama").text(nama);    
                $("#detail_satuan").text(satuan);    
                $("#detail_harga_satuan").text(harga_satuan);    
                $("#detail_deskripsi").text(deskripsi);    
                
            });

    $("#update_produk").on("show.bs.modal", function (event) {
                const produk = $(event.relatedTarget);

                var produk_id = produk.data("id");
                var nama = produk.data("nama");
                var satuan = produk.data("satuan");
                var harga_satuan = produk.data("harga_satuan");
                var deskripsi = produk.data("deskripsi");

                $("input[name='nama']").val(nama);    
                $("input[name='id']").val(produk_id);    
                $("input[name='satuan']").val(satuan);    
                $("input[name='harga_satuan']").val(harga_satuan);    
                $("textarea[name='deskripsi']").val(deskripsi);    
                
            });
	});
</script>
@endsection