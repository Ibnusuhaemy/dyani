@extends("layout")
@section("content")

<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Tabel Konsumen</h1>
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
        <li class="active">Tabel Konsumen</li>
    </ul>
</div>
<!-- END Breadcrumb -->

<!-- BEGIN Main Content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-table"></i> Data Konsumen</h3>
            </div>
            <div class="box-content">
              <a href="{{ url("/tambah-konsumen") }}" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>
              <hr>
              
              <div class="table-responsive" style="border:0;">
                  <table class="table table-advance" id="table1">
                      <thead>
                          <tr>
                             <th>#</th>
                             <th>Nama Konsumen</th>
                             <th>Alamat</th>
                             <th>Nomor Telepon</th>
                             <th>Manage</th>
                          </tr>
                      </thead>
                      <tbody>
                      	@php
                      	$i=1;
                      	@endphp
                      	@foreach($pelanggan as $pelanggan)

                      		<tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $pelanggan->nama }}</td>
                              <td>{{ $pelanggan->alamat }}</td>
                              <td>{{ $pelanggan->telp }}</td>
                              <td>
                                  <a class="btn btn-success" href="#detail_pelanggan" data-toggle="modal" data-toggle="modal" data-nama="{{ $pelanggan->nama }}"  data-alamat="{{ $pelanggan->alamat }}"  data-telp="{{ $pelanggan->telp }}" data-email={{ $pelanggan->email }}><i class="fa fa-cog"></i> Detail</a>
                                  <a class="btn btn-success" href="#" data-target="#update_pelanggan" data-toggle="modal" data-nama="{{ $pelanggan->nama }}"  data-alamat="{{ $pelanggan->alamat }}"  data-telp="{{ $pelanggan->telp }}" data-id="{{ $pelanggan->id }}"><i class="fa fa-external-link"></i> Edit</a>
                                  <a href="{{ url("/hapus-konsumen/".$pelanggan->id) }}" class="btn btn-success"><i class="fa fa-trash"></i> Hapus</a>
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
<div id="detail_pelanggan" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="myModalLabel1">Detail Data Konsumen</h3>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Nama: </div>
                        <div class="col-sm-8 col-md-9" id="detail_nama"></div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Alamat: </div>
                        <div class="col-sm-8 col-md-9" id="detail_alamat"></div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Nomor Telepon: </div>
                        <div class="col-sm-8 col-md-9" id="detail_telp"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Email: </div>
                        <div class="col-sm-8 col-md-9" id="detail_email"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="update_pelanggan" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form action="{{ url("/update-pelanggan") }}" method="post">
        		<input type="hidden" name="id">
        	<div class="modal-header">
                <h3 id="myModalLabel1">Update Data Pelanggan</h3>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Nama: </div>
                        <div class="col-sm-8 col-md-9"><input type="text" class="form-control" name="nama" value=""></div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Alamat: </div>
                        <div class="col-sm-8 col-md-9"><textarea name="alamat" cols="55" rows="4"></textarea></div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Nomor Telepon: </div>
                        <div class="col-sm-8 col-md-9"><input type="text" class="form-control" name="telp"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Email: </div>
                        <div class="col-sm-8 col-md-9"><input type="text" class="form-control" name="email"></div>
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
		$("#detail_pelanggan").on("show.bs.modal", function (event) {
                const pelanggan = $(event.relatedTarget);

                var pelanggan_id = pelanggan.data("item-id");
                var nama = pelanggan.data("nama");
                var alamat = pelanggan.data("alamat");
                var telp = pelanggan.data("telp");
                var email = pelanggan.data("email");

                $("#detail_nama").text(nama);    
                $("#detail_alamat").text(alamat);    
                $("#detail_telp").text(telp);    
                $("#detail_email").text(email);    
                
            });
	});
</script>
@endsection