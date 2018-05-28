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
                <h3><i class="fa fa-table"></i> {{$nota->kode}} </h3> <h3 id="total_harga" class="pull-right">Rp. 0</h3>
            </div>
			  
			   <div class="box-content">
			   	<div class="tabbable">
					<ul id="myTab1" class="nav nav-tabs">
						<li class="active"><a href="#nota" data-toggle="tab"><i class="fa fa-shopping-cart"></i> Nota</a></li>
						<li class=""><a href="#profile1" data-toggle="tab"><i class="fa fa-tasks"></i> Item pesanan</a></li>
						
					</ul>

					<div id="myTabContent1" class="tab-content">
					<div class="tab-pane fade active in" id="nota">
						<form action="{{ url("/pemesanan/update") }}" class="form-horizontal" id="validation-form" method="post">
							{{ csrf_field() }}
						{{-- <div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="username">No Pesanan:</label>
							<div class="col-sm-6 col-lg-4 controls">
								<input type="number" name="username" id="username" class="form-control" data-rule-required="true" data-rule-minlength="1" />
							</div>
						</div> --}}
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="konsumen">Nama Konsumen:</label>
							<div class="col-sm-6 col-lg-4 controls">
							<input type="text" name="nama" id="konsumen" class="form-control" value="{{$nota->pelanggan->nama}}" data-rule-required="true" data-rule-minlength="3" disabled/>
							</div>
							<span class="col-sm-3"><i class="fa fa-users"></i> <a href="#">Cari dari Pelanggan</a></span>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="nama">No Telp Konsumen:</label>
							<div class="col-sm-6 col-lg-4 controls">
								<input type="number" name="telp" id="nama" class="form-control" data-rule-required="true" data-rule-minlength="4"  value="{{$nota->pelanggan->telp}}" disabled/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="nama">Email:</label>
							<div class="col-sm-6 col-lg-4 controls">
								<input type="email" name="email" id="email" class="form-control" data-rule-required="true" data-rule-minlength="4"  value="{{$nota->pelanggan->email}}" disabled/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="nama">Alamat:</label>
							<div class="col-sm-6 col-lg-4 controls">
								<textarea name="alamat" id="" cols="30" rows="3" disabled class="form-control">{{$nota->pelanggan->alamat}}" </textarea>
							</div>
						</div>
						 <div class="form-group">
						  <label class="col-sm-3 col-lg-2 control-label">Tanggal Pesan:</label>
						  <div class="col-sm-6 col-lg-4 controls">
							 <input class="form-control date-picker" id="dp1" size="16" type="date"  value="{{$nota->tgl_pesan}}"  readonly="" name="tgl_pesan" />
						  </div>
						</div>
						<div class="form-group">
						  <label class="col-sm-3 col-lg-2 control-label">Tanggal Selesai:</label>
						  <div class="col-sm-6 col-lg-4 controls">
							 <input class="form-control date-picker" id="dp1" size="16" type="date"  value="{{$nota->tgl_ambil}}" readonly="" name="tgl_ambil" />
							 <span class="help-inline">Dihitung otomatis berdasarkan item pesanan</span>
						  </div>
						</div>
						 <div class="form-group">
							  <label class="col-sm-3 col-lg-2 control-label">Waktu Ambil:</label>
							  <div class="col-sm-6 col-lg-4 controls">
							  	<select name="waktu_ambil" id="" class="form-control">
							  		<option value="siang" @if($nota->waktu_ambil == 'siang') selected @endif>Siang</option>
							  		<option value="sore" @if($nota->waktu_ambil == 'sore') selected @endif>Sore</option>
							  		<option value="malam" @if($nota->waktu_ambil == 'malam') selected @endif>Malam</option>
							  	</select>
								 {{-- <div class="input-group">
									<a class="input-group-addon" href="#"><i class="fa fa-clock-o"></i></a>
									<input class="form-control timepicker-24" type="text">
								 </div> --}}
							  </div>
						   </div>
						{{-- <div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="jenis">Harga:</label>
							<div class="col-sm-6 col-lg-4 controls">
								<input type="number" name="jenis" id="jenis" class="form-control" data-rule-required="true" data-rule-minlength="3" readonly="" />
								<span class="help-inline">Dihitung otomatis berdasarkan item pesanan</span>
							</div>
						</div> --}}
						{{-- <div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="jumlah">Jumlah Pesanan:</label>
							<div class="col-sm-6 col-lg-4 controls">
								<input type="number" name="jumlah" id="jumlah" class="form-control" data-rule-required="true" data-rule-minlength="3" />
							</div>
						</div>
						<div class="form-group">
						  <label class="col-sm-3 col-lg-2 control-label">Bahan</label>
						  <div class="col-sm-6 col-lg-4 controls">
							 <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
								<option value="">Select...</option>
								<option value="Category 1">Category 1</option>
								<option value="Category 2">Category 2</option>
								<option value="Category 3">Category 5</option>
								<option value="Category 4">Category 4</option>
							 </select>
						  </div>
					   </div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="spes">Spesifikasi:</label>
							<div class="col-sm-6 col-lg-4 controls">
								<input type="text" name="spes" id="spes" class="form-control" data-rule-required="true" data-rule-minlength="3" />
							</div>
						</div>
						<div class="form-group">
						  <label class="col-sm-3 col-lg-2 control-label">Nama CS</label>
						  <div class="col-sm-6 col-lg-4 controls">
							 <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
								<option value="">Select...</option>
								<option value="Category 1">Category 1</option>
								<option value="Category 2">Category 2</option>
								<option value="Category 3">Category 5</option>
								<option value="Category 4">Category 4</option>
							 </select>
						  </div>
					   </div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="fin">Jenis Finishing:</label>
							<div class="col-sm-6 col-lg-4 controls">
								<input type="text" name="fin" id="fin" class="form-control" data-rule-required="true" data-rule-minlength="3" />
							</div>
						</div>
						<div class="form-group">
						  <label class="col-sm-3 col-lg-2 control-label">Tipe Pembayaran</label>
						  <div class="col-sm-6 col-lg-4 controls">
							 <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
								<option value="">Select...</option>
								<option value="Category 1">Tunai</option>
								<option value="Category 2">Transfer</option>
							 </select>
						  </div>
					   </div>
						<div class="form-group">
							<label class="col-sm-3 col-lg-2 control-label" for="bay">Jumlah Bayar:</label>
							<div class="col-sm-6 col-lg-4 controls">
								<input type="text" name="bay" id="bay" class="form-control" data-rule-required="true" data-rule-minlength="3" />
							</div>
						</div>
						<div class="form-group">
						  <label class="col-sm-3 col-lg-2 control-label">Kekurangan Bayar</label>
						  <div class="col-sm-6 col-lg-4 controls">
							 <input class="form-control" type="text" placeholder="Disabled input here..." disabled />
						  </div>
					   </div> --}}
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
								<input type="submit" class="btn btn-success" value="Update">
								<a class="btn" href="tdatapesan.html">Cancel</a>
							</div>
						</div>
					</form>
					</div>
					<div class="tab-pane fade" id="profile1">
						@if()
						@else
						@endif
					</div>
					
					</div>

					</div>
					<a href="#" class="btn btn-info text-center">Cetak</a>
			   </div>
             
              
        </div>
    </div>
</div>

@endsection