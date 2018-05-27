@extends("layout")

@section('content')
<div class="page-title">
                    <div>
                        <h1><i class="fa fa-file-o"></i> Tabel Data Pemesanan</h1>
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
                        <li class="active">Data Pemesanan</li>
                    </ul>
                </div>
                <!-- END Breadcrumb -->

                <!-- BEGIN Main Content -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="fa fa-table"></i> Data Pemesanan</h3>
                            </div>
                            <div class="box-content">
                              <a href="{{ url("/pemesanan/tambah") }}" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>
                              <hr>
                              
                              <div class="table-responsive" style="border:0;">
                                  <table class="table table-advance" id="table1">
                                      <thead>
                                          <tr>
                                             <th>ID</th>
                                             <th>No Pesanan</th>
											 <th>Nama Konsumen</th>
											 <th>Tanggal Pesan</th>
											 <th>Status Desain</th>
											 <th>Manage</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>1</td>
                                              <td>31</td>
                                              <td>Ryansyah</td>
											  <td>22042018</td>
											  <td>Langsung Proses Cetak</td>
											  
                                              <td>
                                                  <a class="btn btn-success" href="#modaldetail" data-toggle="modal"><i class="fa fa-cog"></i> Detail</a>
                                                  <a class="btn btn-success" href="edatapesan.html"><i class="fa fa-external-link"></i> Edit</a>
                                                  <button class="btn btn-success"><i class="fa fa-eraser"></i> Hapus</button>
                                                  <a class="btn btn-success" href="invoice_order.html"><i class="fa fa-print"></i> Cetak</a>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                              
                              
                              
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@section("modal")

<div id="modaldetail" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="myModalLabel1">Detail Data Pemesanan</h3>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
					<div class="form-group">
                        <div class="col-sm-4 col-md-3">No Pesanan: </div>
                        <div class="col-sm-8 col-md-9">31  </div>
                    </div>
					<hr/>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Nama Konsumen: </div>
                        <div class="col-sm-8 col-md-9"> Ryansyah</div>
                    </div>
                    <hr/>
					<div class="form-group">
                        <div class="col-sm-4 col-md-3">No Telp Konsumen: </div>
                        <div class="col-sm-8 col-md-9"> 0341</div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Tanggal Pesan: </div>
                        <div class="col-sm-8 col-md-9">22042018</div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-3">Tanggal Selesai: </div>
                        <div class="col-sm-8 col-md-9">27042018</div>
                    </div>
					<hr/>
					<div class="form-group">
                        <div class="col-sm-4 col-md-3">Waktu Selesai: </div>
                        <div class="col-sm-8 col-md-9">19.30</div>
                    </div>
					<hr/>
					<div class="form-group">
                        <div class="col-sm-4 col-md-3">Jenis Pesanan: </div>
                        <div class="col-sm-8 col-md-9">-</div>
                    </div>
					<hr/>
					<div class="form-group">
                        <div class="col-sm-4 col-md-3">Jumlah Pesanan: </div>
                        <div class="col-sm-8 col-md-9">10</div>
                    </div>
					<hr/>
					<div class="form-group">
                        <div class="col-sm-4 col-md-3">Bahan: </div>
                        <div class="col-sm-8 col-md-9">Kertas HVS</div>
                    </div>
					<hr/>
					<div class="form-group">
                        <div class="col-sm-4 col-md-3">Spesifikasi : </div>
                        <div class="col-sm-8 col-md-9">-</div>
                    </div>
					<hr/>
					<div class="form-group">
                        <div class="col-sm-4 col-md-3">Nama CS: </div>
                        <div class="col-sm-8 col-md-9">-</div>
                    </div>
					<hr/>
					<div class="form-group">
                        <div class="col-sm-4 col-md-3">Jenis Finishing: </div>
                        <div class="col-sm-8 col-md-9">-</div>
                    </div>
					<hr/>
					<div class="form-group">
                        <div class="col-sm-4 col-md-3">Tipe Pembayaran : </div>
                        <div class="col-sm-8 col-md-9">-</div>
                    </div>
					<hr/>
					<div class="form-group">
                        <div class="col-sm-4 col-md-3">Jumlah Bayar: </div>
                        <div class="col-sm-8 col-md-9">-</div>
                    </div>
					<hr/>
					<div class="form-group">
                        <div class="col-sm-4 col-md-3">Kekurangan Bayar: </div>
                        <div class="col-sm-8 col-md-9">-</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection