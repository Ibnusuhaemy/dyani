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
			   	<div class="btn-toolbar pull-right">
				<div class="btn-group">
				<a class="btn btn-circle btn-bordered btn-fill btn-to-success show-tooltip" title="" href="#" data-original-title="Tambah Item Pesanan" data-toggle="modal" data-target="#tambah_pesanan"><i class="fa fa-plus"></i></a>
				<a class="btn btn-circle btn-bordered btn-fill btn-to-warning show-tooltip" title="" href="#" data-original-title="Pembayaran"><i class="fa fa-money"></i></a>
				<a class="btn btn-circle btn-bordered btn-fill btn-to-info show-tooltip" title="" href="#" data-original-title="Print"><i class="fa fa-print"></i></a>
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
						<li class=""><a href="#item" data-toggle="tab"><i class="fa fa-tasks"></i> Item pesanan</a></li>
						{{-- <li class=""><a href="#pembayaran" data-toggle="tab"><i class="fa fa-money"></i> Pembayaran</a></li> --}}
						
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
							{{-- <span class="col-sm-3"><i class="fa fa-users"></i> <a href="#">Cari dari Pelanggan</a></span> --}}
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
								<textarea name="alamat" id="" cols="30" rows="3" disabled class="form-control">{{$nota->pelanggan->alamat}} </textarea>
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
					<div class="tab-pane fade" id="item">
						<table class="table table-advance">
						<thead>
						<tr>
						<th style="width:18px"><input type="checkbox"></th>
						<th style="width: 20%">Jenis Pesanan</th>
						<th style="width: 15%">Harga (Rp.)</th>
						<th style="width: 23%">Bahan</th>
						<th style="width: 25%">Ukuran</th>
						<th style="width: 12%">Jumlah</th>
{{-- 						<th>Desain</th>
						<th>Finishing</th>
						<th>Catatan</th> --}}
						
						{{-- <th>Detail</th> --}}
						<th style="width: 5%">Opsi</th>
						</tr>
						</thead>
						<tbody>
							@foreach($detail_nota as $detail_nota)
							<tr class="table-flag-blue">
							<td><input type="checkbox"></td>
							<td>{{ ucfirst($detail_nota->produk->nama) }}</td>
							<td>{{ number_format($detail_nota->produk->harga_satuan) }} /{{ $detail_nota->produk->satuan }}</td>
							<td>
								<select name="bahan_baku" id="" class="form-control">
									<option value="-1">Default</option>
									@foreach($bahan_baku as $bahan)
										<option value="{{ $bahan->id }}">{{ ucfirst($bahan->nama) }}</option>
									@endforeach
								</select>
							</td>
							<td><input type="text" class="form-control" name="ukuran" placeholder="Ukuran" required=""></td>
							<td><input type="number" min="1" name="jumlah" placeholder="Jumlah" class="form-control" required="">
							
							<td>
								<div class="btn-group"> <button type="button" class="btn btn-circle btn-bordered btn-fill dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-h"></i></button> <ul class="dropdown-menu dropdown-menu-right"> 
									<li><a href="#">Upload File</a></li>
									<li><a href="#">Proses Desain</a></li>
									<li><a href="#">Finishing</a></li>
									<li><a href="#">Catatan Lain</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="#">Hapus</a></li>
								</ul> </div>
							</td>
							</tr>	
							@endforeach
						
						@if(sizeof($detail_nota)==0)
						<tr>
							<td colspan="7">
								<h3 class="text-center help-text">Kosong</h3>
							</td>
						</tr>
						@endif
						
						</tbody>
						</table>
						<button class="btn btn-success">Simpan</button>
						{{-- <a href="" class="btn btn-success">Tambah</a> --}}
					</div>
					{{-- <div class="tab-pane fade" id="pembayaran">
					</div> --}}
					
					</div>

					</div>
					{{-- <a href="#" class="btn btn-info text-center">Cetak</a> --}}
			   </div>
             
              
        </div>
    </div>
</div>

@endsection

@section("modal")

<div id="tambah_pesanan" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="myModalLabel1">Katalog Produk</h3>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
					<table  class="table table-advance">
						<thead>
							<tr>
								<th><input type="checkbox"></th>
								<th>Nama</th>
								<th>Harga Satuan(Rp.)</th>
								<th>Satuan</th>
								<th>Pilih</th>
							</tr>
						</thead>
						<tbody>
							@foreach($produk as $produk)
							<tr>
								<td>
									<input type="checkbox">
								</td>
								<td>
									{{$produk->nama}}
								</td>
								<td>
									{{$produk->harga_satuan}}
								</td>
								<td>
									{{$produk->satuan}}
								</td>
								<td>
									<form action="{{ url("/tambah-item") }}" method="post">
										{{ csrf_field() }}
										<input type="hidden" name="produk_id" value="{{$produk->id}}">
										<input type="hidden" name="nota_id" value="{{$nota->id}}">
										<button class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
									</form>
									
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>                    
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Tambahkan (<span id="total_pilih">0</span> Produk)</button>
            </div>
        </div>
    </div>
</div>

@endsection