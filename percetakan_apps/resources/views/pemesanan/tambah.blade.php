@extends("layout")

@section("content")

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
            <a href="{{ url("/") }}">Home</a>
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
                <h3><i class="fa fa-table"></i> Nota </h3> <h3 id="total_harga" class="pull-right">Rp. 0</h3>
            </div>
			  
			   <div class="box-content">
			   	<div class="btn-toolbar pull-right">
				<div class="btn-group">
				<button disabled="" class="btn btn-circle btn-bordered btn-fill btn-to-success show-tooltip" title="" href="#" data-original-title="Tambah Item Pesanan"><i class="fa fa-plus"></i></button>
				{{-- <button disabled="" class="btn btn-circle btn-bordered btn-fill btn-to-warning show-tooltip" title="" href="#" data-original-title="Pembayaran"><i class="fa fa-money"></i></button> --}}
				<button disabled="" class="btn btn-circle btn-bordered btn-fill btn-to-info show-tooltip" title="" href="#" data-original-title="Print"><i class="fa fa-print"></i></button>
				</div>
				{{-- <div class="btn-group">
					<a class="btn btn-circle btn-bordered btn-fill btn-to-danger btn-danger show-tooltip" title="" href="#" data-original-title="Delete selected"><i class="fa fa-trash-o"></i></a>
				
				</div>
				<div class="btn-group">
				<a class="btn btn-circle btn-bordered btn-fill btn-to-lime show-tooltip" title="" href="#" data-original-title="Refresh"><i class="fa fa-repeat"></i></a>
				</div> --}}
				</div>
			   	<div class="tabbable">
					<ul id="myTab1" class="nav nav-tabs">
						<li class="active"><a href="#nota" data-toggle="tab"><i class="fa fa-shopping-cart"></i> Nota</a></li>
						<li class=""><a href="#item-pesanan" data-toggle="tab"><i class="fa fa-tasks"></i> Item pesanan</a></li>
						
					</ul>

					<div id="myTabContent1" class="tab-content">
					<div class="tab-pane fade active in" id="nota">
						<form action="{{ url("/pemesanan") }}" class="form-horizontal" id="validation-form" method="post">
							{{ csrf_field() }}
						{{-- <div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="username">No Pesanan:</label>
							<div class="col-sm-6 col-lg-4 controls">
								<input type="number" name="username" id="username" class="form-control" data-rule-required="true" data-rule-minlength="1" />
							</div>
						</div> --}}
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label class="col-sm-3 col-lg-3 control-label" for="konsumen">Nama Konsumen:</label>
							<div class="col-sm-6 col-lg-6 controls">
								<input type="text" name="nama" id="konsumen" class="form-control" data-rule-required="true" data-rule-minlength="3" />
							</div>
							<span class="col-sm-3 col-lg-3"><i class="fa fa-users"></i> <a href="#">Cari Pelanggan</a></span>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-3 control-label" for="nama">Telp:</label>
							<div class="col-sm-6 col-lg-6 controls">
								<input type="number" name="telp" id="nama" class="form-control" data-rule-required="true" data-rule-minlength="4" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-3 control-label" for="nama">Email:</label>
							<div class="col-sm-6 col-lg-6 controls">
								<input type="email" name="email" id="email" class="form-control" data-rule-required="true" data-rule-minlength="4" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-3 control-label" for="nama">Alamat:</label>
							<div class="col-sm-6 col-lg-6 controls">
								<textarea name="alamat" id="" cols="30" rows="3" class="form-control"></textarea>
							</div>
						</div>
						 <div class="form-group">
						  <label class="col-sm-3 col-lg-3 control-label">Tanggal Pesan:</label>
						  <div class="col-sm-6 col-lg-6 controls">
							 <input class="form-control date-picker" id="dp1" size="16" type="date" value={{ date("Y-m-d") }} readonly="" name="tgl_pesan" />
						  </div>
						</div>
						<div class="form-group">
						  <label class="col-sm-3 col-lg-3 control-label">Tanggal Selesai:</label>
						  <div class="col-sm-6 col-lg-6 controls">
							 <input class="form-control date-picker" id="dp1" size="16" type="date" value="{{ date("Y-m-d") }}" readonly="" name="tgl_ambil" />
							 <span class="help-inline">Dihitung otomatis berdasarkan item pesanan</span>
						  </div>
						</div>
						 <div class="form-group">
							  <label class="col-sm-3 col-lg-3 control-label">Waktu Ambil:</label>
							  <div class="col-sm-6 col-lg-6 controls">
							  	<select name="waktu_ambil" id="" class="form-control">
							  		<option value="siang">Siang</option>
							  		<option value="sore">Sore</option>
							  		<option value="malam">Malam</option>
							  	</select>
								 {{-- <div class="input-group">
									<a class="input-group-addon" href="#"><i class="fa fa-clock-o"></i></a>
									<input class="form-control timepicker-24" type="text">
								 </div> --}}
							  </div>
						   </div>

						</div>
						<div class="col-md-6">
							<div class="form-group">
								  <label class="col-sm-3 col-lg-3 control-label">Tipe Pembayaran</label>
								  <div class="col-sm-6 col-lg-6 controls">
									 <select class="form-control" name="transaksi" data-placeholder="Pilih Transaksi" tabindex="1">
										{{-- <option value="">Select...</option> --}}
										<option value="cash">Tunai</option>
										<option value="DP">DP</option>
										<option value="transfer bank">Transfer</option>
									 </select>
								  </div>
							   </div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-3 control-label" for="bay">Jumlah Bayar:</label>
							<div class="col-sm-6 col-lg-6 controls">
								<input type="text" name="bay" id="bay" class="form-control" data-rule-required="true" data-rule-minlength="3" disabled="" placeholder="0" />
							</div>
						</div>
						<div class="form-group">
						  <label class="col-sm-3 col-lg-3 control-label">Kekurangan Bayar</label>
						  <div class="col-sm-6 col-lg-6 controls">
							 <input class="form-control" type="text" placeholder="0" disabled />
						  </div>
						</div>
						</div>
						<div class="col-md-12 text-center">
							<button class="btn btn-success">Simpan</button>
						</div>
						</div>

					</form>
				</div>
					<div class="tab-pane fade" id="item-pesanan">
						<table class="table table-advance">
						<thead>
						<tr>
						<th style="width:18px"><input disabled="" type="checkbox"></th>
						<th style="width: 25%">Jenis Pesanan</th>
						<th style="width: 15%">Harga (Rp.)</th>
						<th style="width: 25%">Bahan</th>
						<th style="width: 20%">Ukuran</th>
						<th style="width: 15%">Jumlah</th>
{{-- 						<th>Desain</th>
						<th>Finishing</th>
						<th>Catatan</th> --}}
						
						{{-- <th>Detail</th> --}}
						<th>Opsi</th>
						</tr>
						</thead>
						<tbody>
						
						<tr>
							<td colspan="7">
								<h3 class="text-center help-text">Kosong</h3>
							</td>
						</tr>
						</tbody>
						</table>
						<button class="btn btn-success" disabled="">Simpan</button>
					</div>
					
					</div>

					</div>
					{{-- <a href="#" class="btn btn-info text-center">Cetak</a> --}}
			   </div>
             
              
        </div>
    </div>
</div>

@endsection