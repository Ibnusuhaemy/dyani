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
                                <td>{{ $bahan_baku->harga_jual }} - {{ $bahan_baku->harga_beli }}</td>
                                <td>
                                	{{ $bahan_baku->satuan }}
                                </td>
                                <td>
                                    <a class="btn btn-success" href="#detail_bahan" data-toggle="modal"><i class="fa fa-cog"></i> Detail</a>
                                    <a class="btn btn-success" href="#edit_bahan"><i class="fa fa-external-link"></i> Edit</a>
                                    <a href="{{ url("hapus-bahan-baku/".$bahan_baku->id) }}" class="btn btn-success"><i class="fa fa-eraser"></i> Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="modaldetail" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 id="myModalLabel1">Detail Data Bahan</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-4 col-md-3">Nomor Bahan Baku: </div>
                                            <div class="col-sm-8 col-md-9">1</div>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-md-3">Nama Bahan Baku: </div>
                                            <div class="col-sm-8 col-md-9">Semen Tiga Roda</div>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-md-3">Jenis Bahan Baku: </div>
                                            <div class="col-sm-8 col-md-9">Bahan Bangunan</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection