@extends("layout")
@section("content")

<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Tabel Bahan Baku</h1>
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
        <li class="active">Tabel Bahan Baku</li>
    </ul>
</div>
<!-- END Breadcrumb -->

<!-- BEGIN Main Content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-table"></i> Tabel Bahan Baku</h3>
            </div>
            <div class="box-content">
                <a href="{{ url("/tambah-bahan-baku") }}" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>
                <hr>
                <div class="table-responsive" style="border:0;">
                    <table class="table table-advance" id="table1">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Harga Jual - Harga Beli</th>
                            <th>Satuan</th>
                            <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@php
                        	$i=1;
                        	@endphp
                        	@foreach($bahan_baku as $bahan_baku)
                        	
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ ucfirst($bahan_baku->nama) }}</td>
                                <td>{{ $bahan_baku->harga_jual_satuan }} - {{ $bahan_baku->harga_beli_satuan }}</td>
                                <td>
                                	{{ $bahan_baku->satuan }}
                                </td>
                                <td>
                                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#detail_bahan_baku" data-nama="{{ $bahan_baku->nama }}" data-harga-jual="{{ $bahan_baku->harga_jual_satuan }}" data-harga-beli="{{ $bahan_baku->harga_beli_satuan }}" data-qty="{{ $bahan_baku->qty }}" data-satuan="{{ $bahan_baku->satuan }}"><i class="fa fa-cog"></i> Detail</a>
                                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#update_bahan_baku" data-id="{{ $bahan_baku->id }}" data-nama="{{ $bahan_baku->nama }}" data-harga-jual="{{ $bahan_baku->harga_jual_satuan }}" data-harga-beli="{{ $bahan_baku->harga_beli_satuan }}" data-qty="{{ $bahan_baku->qty }}" data-satuan="{{ $bahan_baku->satuan }}"><i class="fa fa-external-link"></i> Edit</a>
                                    <a href="{{ url("hapus-bahan-baku/".$bahan_baku->id) }}" class="btn btn-success"><i class="fa fa-eraser"></i> Hapus</a>
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
<div id="detail_bahan_baku" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="myModalLabel1">Detail Data Bahan</h3>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">Nama: </div>
                            <div class="col-sm-8 col-md-9"><span id="detail_nama"></span></div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">Qty: </div>
                            <div class="col-sm-8 col-md-9"><span id="detail_qty"></span></div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">Satuan: </div>
                            <div class="col-sm-8 col-md-9"><span id="detail_satuan"></span></div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">Harga Beli: </div>
                            <div class="col-sm-8 col-md-9"><span id="detail_harga_beli"></span></div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <div class="col-sm-4 col-md-3">Harga Jual: </div>
                            <div class="col-sm-8 col-md-9"><span id="detail_harga_jual"></span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
</div>

<div id="update_bahan_baku" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url("/update-bahan-baku") }}" method="post">
                <input type="hidden" name="id">
            {{ csrf_field() }}
            <div class="modal-header">
                <h3 id="myModalLabel1">Update Data Bahan Baku</h3>
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
                        <label class="col-sm-3 col-lg-2 control-label" for="qty">Qty:</label>
                        <div class="col-sm-6 col-lg-4 controls">
                            <input type="number" name="qty" id="qty" class="form-control" data-rule-required="true" data-rule-minlength="3" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="satuan">Satuan:</label>
                        <div class="col-sm-6 col-lg-4 controls">
                            <input type="text" name="satuan" id="satuan" class="form-control" data-rule-required="true"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="harga_beli">Harga Beli:</label>
                        <div class="col-sm-6 col-lg-4 controls">
                            <input type="text" name="harga_beli" id="harga_beli" class="form-control" data-rule-required="true"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="harga_jual">Harga Jual:</label>
                        <div class="col-sm-6 col-lg-4 controls">
                            <input type="text" name="harga_jual" id="harga_jual" class="form-control" data-rule-required="true" data-rule-minlength="3" />
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

@section("script")
<script type="text/javascript">
    $(document).ready(function(){
        $("#detail_bahan_baku").on("show.bs.modal", function (event) {
                const bahan_baku = $(event.relatedTarget);
                var nama = bahan_baku.data("nama");
                var qty = bahan_baku.data("qty");
                var harga_jual = bahan_baku.data("harga-jual");
                var harga_beli = bahan_baku.data("harga-beli");
                var satuan = bahan_baku.data("satuan");

                $("#detail_nama").text(nama);    
                $("#detail_qty").text(qty);    
                $("#detail_harga_jual").text(harga_jual);    
                $("#detail_satuan").text(satuan);    
                
            });

    $("#update_bahan_baku").on("show.bs.modal", function (event) {
                const bahan_baku = $(event.relatedTarget);

                var bahan_baku_id = bahan_baku.data("id");
                var nama = bahan_baku.data("nama");
                var qty = bahan_baku.data("qty");
                var harga_jual = bahan_baku.data("harga-jual");
                var harga_beli = bahan_baku.data("harga-beli");
                var satuan = bahan_baku.data("satuan");

                $("input[name='nama']").val(nama);    
                $("input[name='id']").val(bahan_baku_id);    
                $("input[name='satuan']").val(satuan);    
                $("input[name='harga_jual']").val(harga_jual);    
                $("input[name='harga_beli']").val(harga_beli);    
                $("input[name='qty']").val(qty);
                
            });
    });
</script>
@endsection