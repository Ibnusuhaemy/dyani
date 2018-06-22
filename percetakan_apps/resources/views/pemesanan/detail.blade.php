
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
                <h3><i class="fa fa-table"></i> {{$nota->kode}} </h3> <h3 class="pull-right">Rp. <span id="total_harga">0</span></h3>
            </div>
			  
			   <div class="box-content">
			   	<div class="btn-toolbar pull-right">
				<div class="btn-group">
				<a class="btn btn-circle btn-bordered btn-fill btn-to-success show-tooltip" title="" href="#" data-original-title="Tambah Item Pesanan" data-toggle="modal" data-target="#tambah_pesanan"><i class="fa fa-plus"></i></a>
				<a class="btn btn-circle btn-bordered btn-fill btn-to-warning show-tooltip" title="" href="{{ url("/invoice/".$nota->id) }}" data-original-title="Invoice"><i class="fa fa-money"></i></a>
				<a class="btn btn-circle btn-bordered btn-fill btn-to-info show-tooltip" title="" href="{{ url("/invoice/".$nota->id."/cetak") }}" target="_blank" data-original-title="Cetak"><i class="fa fa-print"></i></a>
				</div>
				<div class="btn-group">
					<form action="{{ url("/hapus-nota") }}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $nota->id }}">
						<button class="btn btn-circle btn-bordered btn-fill btn-to-danger btn-danger show-tooltip" title="" href="#" data-original-title="Hapus Nota"><i class="fa fa-trash-o"></i></button>
					</form>
				</div>
				{{-- 
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
							<input type="hidden" name="id" value="{{ $nota->id }}">
						{{-- <div class="form-group">
							<label class="col-sm-3 col-lg-3 control-label" for="username">No Pesanan:</label>
							<div class="col-sm-6 col-lg-6 controls">
								<input type="number" name="username" id="username" class="form-control" data-rule-required="true" data-rule-minlength="1" />
							</div>
						</div> --}}
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-sm-3 col-lg-3 control-label" for="konsumen">Nama Konsumen:</label>
									<div class="col-sm-6 col-lg-6 controls">
									<input type="text" name="nama" id="konsumen" class="form-control" value="{{$nota->pelanggan->nama}}" data-rule-required="true" data-rule-minlength="3" disabled/>
									</div>
									{{-- <span class="col-sm-3"><i class="fa fa-users"></i> <a href="#">Cari dari Pelanggan</a></span> --}}
								</div>
								<div class="form-group">
									<label class="col-sm-3 col-lg-3 control-label" for="nama">Telp:</label>
									<div class="col-sm-6 col-lg-6 controls">
										<input type="number" name="telp" id="nama" class="form-control" data-rule-required="true" data-rule-minlength="4"  value="{{$nota->pelanggan->telp}}" disabled/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 col-lg-3 control-label" for="nama">Email:</label>
									<div class="col-sm-6 col-lg-6 controls">
										<input type="email" name="email" id="email" class="form-control" data-rule-required="true" data-rule-minlength="4"  value="{{$nota->pelanggan->email}}" disabled/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 col-lg-3 control-label" for="nama">Alamat:</label>
									<div class="col-sm-6 col-lg-6 controls">
										<textarea name="alamat" id="" cols="30" rows="3" disabled class="form-control">{{$nota->pelanggan->alamat}} </textarea>
									</div>
								</div>
								 <div class="form-group">
								  <label class="col-sm-3 col-lg-3 control-label">Tanggal Pesan:</label>
								  <div class="col-sm-6 col-lg-6 controls">
									 <input class="form-control date-picker" id="dp1" size="16" type="date"  value="{{$nota->tgl_pesan}}"  readonly="" name="tgl_pesan" />
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-sm-3 col-lg-3 control-label">Tanggal Selesai:</label>
								  <div class="col-sm-6 col-lg-6 controls">
									 <input class="form-control date-picker" id="dp1" size="16" type="date"  value="{{$nota->tgl_ambil}}" readonly="" name="tgl_ambil" />
									 <span class="help-inline">Dihitung otomatis berdasarkan item pesanan</span>
								  </div>
								</div>
								 <div class="form-group">
									  <label class="col-sm-3 col-lg-3 control-label">Waktu Ambil:</label>
									  <div class="col-sm-6 col-lg-6 controls">
									  	<select name="waktu_ambil" id="" class="form-control">
									  		<option value="siang" @if($nota->waktu_ambil == 'siang') selected @endif>Siang</option>
									  		<option value="sore" @if($nota->waktu_ambil == 'sore') selected @endif>Sore</option>
									  		<option value="malam" @if($nota->waktu_ambil == 'malam') selected @endif>Malam</option>
									  	</select>
									  </div>
								   </div>

								
							</div>
							<div class="col-md-6">
								<div class="form-group">
								 	<label class="col-sm-3 col-lg-3 control-label">Tipe Pembayaran</label>
								 	<div class="col-sm-6 col-lg-6 controls">
										<select class="form-control" disabled="" name="transaksi" data-placeholder="Pilih Transaksi" tabindex="1">
										{{-- <option value="">Select...</option> --}}
											<option value="cash" @if($nota->transaksi == 'cash') selected="" @endif>Tunai</option>
											<option value="DP" @if($nota->transaksi == 'DP') selected="" @endif>DP</option>
											<option value="transfer bank" @if($nota->transaksi == 'transfer bank') selected="" @endif>Transfer</option>
										</select>
								 	</div>
							   	</div>
								<div class="form-group">
									<label class="col-sm-3 col-lg-3 control-label" for="bay">Jumlah Bayar:</label>
									<div class="col-sm-6 col-lg-6 controls">
										<input type="number" min="0" placeholder="Bayar" name="bayar" id="bayar" class="form-control" data-rule-required="true" data-rule-minlength="3" value="{{ $nota->bayar }}" />
									</div>
								</div>
								<div class="form-group">
								  <label class="col-sm-3 col-lg-3 control-label">Kekurangan Bayar</label>
								  <div class="col-sm-6 col-lg-6 controls">
									 <input class="form-control" name="kurang_bayar" type="number" placeholder="Rp." disabled value="" />
								  </div>
								</div>
							</div>
							<div class="col-md-12 text-center">
								
										<input type="submit" class="btn btn-success" value="Update">
										<a class="btn" href="tdatapesan.html">Cancel</a>
									
							</div>
						</div>

						
					</form>
					</div>
					<div class="tab-pane fade" id="item">
						<form action="{{ url("/update-item") }}" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="nota_id" value="{{ $nota->id }}">
						<table class="table table-advance">
						<thead>
						<tr>
						<th style="width:18px"><input type="checkbox"></th>
						<th style="width: 25%">Jenis Pesanan</th>
						<th style="width: 18%">Bahan</th>
						<th style="width: 22%">Ukuran</th>
						<th style="width: 10%">Jumlah</th>
						<th style="width: 18%">Total Harga</th>
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
							<td><strong>{{ ucfirst($detail_nota->produk->nama) }}</strong> ({{ number_format($detail_nota->produk->harga_satuan) }} /{{ $detail_nota->produk->satuan }})
							</td>
							<td>
								<select name="bahan_baku[]" id="" class="form-control">
									<option value="-1">Default</option>
									@foreach($bahan_baku as $bahan)
										<option value="{{ $bahan->id }}" @if($detail_nota->bahan_baku_id == $bahan->id) selected="" @endif>{{ ucfirst($bahan->nama) }}</option>
									@endforeach
								</select>
							</td>
							<td><input type="text" class="form-control" name="ukuran[]" placeholder="Ukuran" required="" value="{{ $detail_nota->ukuran }}">

							</td>
							<td><input type="number" min="1" name="jumlah[]" placeholder="Jumlah" class="form-control" required="" value="{{ $detail_nota->jumlah }}">
							</td>
							<td><input type="number" min="1" name="total_harga[]" placeholder="Rp." class="form-control harga_item" required="" value="{{ $detail_nota->harga }}">
								<input type="hidden" name="id[]" value="{{ $detail_nota->id }}">
							</td>
							<td>
								<div class="btn-group"> <button type="button" class="btn btn-circle btn-bordered btn-fill dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-h"></i></button> <ul class="dropdown-menu dropdown-menu-right"> 
									<li><a href="#" data-toggle="modal" data-target="#upload_file" data-file-lama="{{ $detail_nota->file_desain }}" data-item-id="{{ $detail_nota->id }}" >Upload File</a></li>
									<li><a href="#" data-toggle="modal" data-target="#catatan_desain" data-item-id="{{ $detail_nota->id }}" data-catatan-desain = "{{ $detail_nota->catatan_desain }}">Proses Desain</a></li>
									<li><a href="#" data-toggle="modal" data-target="#catatan_finishing" data-item-id="{{ $detail_nota->id }}" data-catatan-finishing = "{{ $detail_nota->catatan_finishing }}">Finishing</a></li>
									<li><a href="#" data-toggle="modal" data-target="#catatan" data-item-id="{{ $detail_nota->id }}" data-catatan = "{{ $detail_nota->catatan }}">Catatan Lain</a></li>
									<li role="separator" class="divider"></li>
									<li>
										<a href="{{ url("/hapus-item/".$detail_nota->id) }}" style="color:red">Hapus</a>
										</form>
									</li>
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
						</form>
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
								<th>Pilih</th>
							</tr>
						</thead>
						<tbody>
							@foreach($produk as $produk)
							<tr>
								<td>
									<input type="checkbox" @if(isset($produk->selected)) disabled="" @endif>
								</td>
								<td>
									{{ucfirst($produk->nama)}}
								</td>
								<td>
									{{number_format($produk->harga_satuan)}} /
									{{$produk->satuan}}
								</td>
								<td>
									@if(isset($produk->selected))
									<button class="btn" disabled="">Selected</button>
									@else
									<form action="{{ url("/tambah-item") }}" method="post">
										{{ csrf_field() }}
										<input type="hidden" name="produk_id" value="{{$produk->id}}">
										<input type="hidden" name="nota_id" value="{{$nota->id}}">
										<button class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
									</form>
									@endif
									
									
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

<div id="upload_file" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
			<form action="{{ url("/upload-file") }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
	            <input type="hidden" name="detail_nota_id" value="">
	            <input type="hidden" name="nota_id" value="{{ $nota->id }}">
	            <input type="hidden" name="file_lama" value="">
	            <div class="modal-header">
	                <h3 id="myModalLabel1">Upload File</h3>
	            </div>
	            <div class="modal-body">
	                <div class="form-horizontal">
						<div class="form-group">
									<div class="col-sm-12 col-lg-12 controls">
										<input type="file" name="file_desain" class="form-control" />
										<span class="help-inline">Format: .jpg .png | Ukuran file: maksimal 2MB</span>
									</div>
								</div>
	                </div>
	            </div>
	            <div class="modal-footer">
	            	<span class="pull-left" id="link_file"></span>
	                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	                <button class="btn btn-success" aria-hidden="true">Upload</button>
	            </div>
			</form>                    
        </div>
    </div>
</div>

<div id="catatan_desain" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
			<form action="{{ url("/update-desain") }}" method="post">
				{{ csrf_field() }}
	            <input type="hidden" name="detail_nota_id" value="">
	            {{-- <input type="hidden" name="nota_id" value="{{ $nota->id }}"> --}}
	            <div class="modal-header">
	                <h3 id="myModalLabel1">Catatan Desain</h3>
	            </div>
	            <div class="modal-body">
	                <div class="form-horizontal">
						<div class="form-group">
									<div class="col-sm-12 col-lg-12 controls">
										<textarea name="catatan_desain" id="" cols="69" rows="5"></textarea>
										<p class="help-inline">100 karakter</p>
									</div>
								</div>
	                </div>
	            </div>
	            <div class="modal-footer">
	            	<span class="pull-left" id="link_file"></span>
	                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	                <button class="btn btn-success" aria-hidden="true">Simpan</button>
	            </div>
			</form>                    
        </div>
    </div>
</div>

<div id="catatan_finishing" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
			<form action="{{ url("/update-finishing") }}" method="post">
				{{ csrf_field() }}
	            <input type="hidden" name="detail_nota_id" value="">
	            {{-- <input type="hidden" name="nota_id" value="{{ $nota->id }}"> --}}
	            <div class="modal-header">
	                <h3 id="myModalLabel1">Catatan Finishing</h3>
	            </div>
	            <div class="modal-body">
	                <div class="form-horizontal">
						<div class="form-group">
									<div class="col-sm-12 col-lg-12 controls">
										<textarea name="catatan_finishing" id="" cols="69" rows="5"></textarea>
										<p class="help-inline">100 karakter</p>
									</div>
								</div>
	                </div>
	            </div>
	            <div class="modal-footer">
	            	<span class="pull-left" id="link_file"></span>
	                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	                <button class="btn btn-success" aria-hidden="true">Simpan</button>
	            </div>
			</form>                    
        </div>
    </div>
</div>

<div id="catatan" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
			<form action="{{ url("/update-catatan") }}" method="post">
				{{ csrf_field() }}
	            <input type="hidden" name="detail_nota_id" value="">
	            {{-- <input type="hidden" name="nota_id" value="{{ $nota->id }}"> --}}
	            <div class="modal-header">
	                <h3 id="myModalLabel1">Catatan</h3>
	            </div>
	            <div class="modal-body">
	                <div class="form-horizontal">
						<div class="form-group">
									<div class="col-sm-12 col-lg-12 controls">
										<textarea name="catatan" id="" cols="69" rows="5"></textarea>
										<p class="help-inline">100 karakter</p>
									</div>
								</div>
	                </div>
	            </div>
	            <div class="modal-footer">
	            	<span class="pull-left" id="link_file"></span>
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
		// info total bayar pada pojok kanan atas nota
		var sum = 0;
		$(".harga_item").each(function(){
			sum = parseInt($(this).val())+sum;
		});
		// console.log();
		if (isNaN(sum)) {
			sum = 0;
		}
		$("#total_harga").text(new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(sum));

		// input kurang bayar
		var sudah_bayar = $("input[name='bayar']").val();

		$("input[name='kurang_bayar']").val(sum-sudah_bayar);
		$("input[name='bayar']").on('keyup mouseup', function(){
			$("input[name='kurang_bayar']").val(sum - $(this).val());
		});

		// modal upload file
		$("#upload_file").on("show.bs.modal", function (event) {
                const detail_nota = $(event.relatedTarget);

                var detail_nota_id = detail_nota.data("item-id");
                var file_lama = detail_nota.data("file-lama");

                $("input[name='detail_nota_id']").val(detail_nota_id);
                $("input[name='file_lama']").val(file_lama);

                file_lama = file_lama.replace("public/", "");
                // console.log(file_lama);
                if (file_lama != '') {
                	$("span#link_file").html('<a href="{{ url("/storage") }}/'+ file_lama +'" class="pull-left">Lihat File</a>');
                }else{
                	$("span#link_file").empty();
                }
                
                
            });

		$("#catatan_desain").on("show.bs.modal", function (event) {
                const detail_nota = $(event.relatedTarget);

                var detail_nota_id = detail_nota.data("item-id");
                var catatan_desain = detail_nota.data("catatan-desain");

                $("input[name='detail_nota_id']").val(detail_nota_id);
                $("textarea[name='catatan_desain']").val(catatan_desain);         
                
            });
		$("#catatan_finishing").on("show.bs.modal", function (event) {
                const detail_nota = $(event.relatedTarget);

                var detail_nota_id = detail_nota.data("item-id");
                var catatan_finishing = detail_nota.data("catatan-finishing");

                $("input[name='detail_nota_id']").val(detail_nota_id);
                $("textarea[name='catatan_finishing']").val(catatan_finishing);         
                
            });
		$("#catatan").on("show.bs.modal", function (event) {
                const detail_nota = $(event.relatedTarget);

                var detail_nota_id = detail_nota.data("item-id");
                var catatan = detail_nota.data("catatan");

                $("input[name='detail_nota_id']").val(detail_nota_id);
                $("textarea[name='catatan']").val(catatan);         
                
            });
	});
</script>

@endsection