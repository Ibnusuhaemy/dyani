
@extends("layout")
@section("content")

<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Invoice</h1>
        <h4>Nota Pemesanan</h4>
    </div>
</div>
<!-- END Page Title -->

<!-- BEGIN Breadcrumb -->
<div id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ url("/pemesanan") }}">Data Pemesanan</a>
            <span class="divider"><i class="fa fa-angle-right"></i></span>
        </li>
        <li class="active">Invoice</li>
    </ul>
</div>
<!-- END Breadcrumb -->

<!-- BEGIN Main Content -->
<div class="row" id="ele1">
    <div class="col-md-12">
        <div class="box">
            <div class="box-content">
                <div class="invoice">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Dyani Printing</h2>
                        </div>
                        <div class="col-md-6 invoice-info">
                            <p class="font-size-17"><strong>{{ $nota->kode }}</strong></p>
                            <p>22 April 2018</p>
                        </div>
                    </div>

                    <hr class="margin-0" />

                    <div class="row">
                        <div class="col-md-6 company-info">
                            <h4>Dyani Printing</h4>
                            <p>Jl. Ayani KM. 5 komp Bumi Kasturi No.9,<br/>RT. 02, Banjarmasin</p>
                            <p><i class="fa fa-phone"></i> 0816-561-615</p>
                            <p><i class="fa fa-globe"></i> www.dyaniprinting.com</p>
                            <p><i class="fa fa-envelope"></i> denysaputra1031@gmail.com</p>
                        </div>
                        <div class="col-md-6 company-info">
                            <h4>{{ $nota->pelanggan->nama }}</h4>
                            <p><i class="fa fa-phone"></i> {{ $nota->pelanggan->telp }}</p>
                            <p><i class="fa fa-calendar"></i> Pemesanan: {{ $nota->tgl_pesan }}</p>
                            <p><i class="fa fa-calendar"></i> Selesai: {{ $nota->tgl_ambil }}, {{ $nota->waktu_ambil }}</p>
                        </div>
                    </div>

                    <br/><br/>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Jenis Pesanan</th>
                                    <th class="hidden-480">Jumlah</th>
                                    <th class="hidden-480">Bahan</th>
                                    <th class="hidden-480">Spesifikasi</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            	$i=1
                            	@endphp
                            	@foreach($nota->detail_nota as $detail_nota)
                            	<tr>
                                    <td class="center">{{ $i++ }}</td>
                                    <td>{{ ucfirst($detail_nota->produk->nama) }}</td>
                                    <td>{{ $detail_nota->jumlah }}</td>
                                    <td>
                                    	@if($detail_nota->bahan_baku_id === -1)
                                    		Bahan default
                                    	@else
                                    		{{ $detail_nota->bahan_baku->nama }}
                                    	@endif
                                    </td>
                                    <td>
                                    	@if($detail_nota->catatan == '')
                                    		-
                                    	@else

                                    	{{ $detail_nota->catatan }} 
                                    	@endif
                                    </td>
                                    <td>Rp {{ number_format($detail_nota->harga) }}</td>
                                </tr>
                            	@endforeach
                                
                                {{-- <tr>
                                    <td class="center">2</td>
                                    <td>Kartu Nama</td>
                                    <td>1 (Pack)</td>
                                    <td>Kertas Foto</td>
                                    <td>Ukuran Sedang</td>
                                    <td>Rp 350.000</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="row">
                        <div class="col-md-12">
                            <p>Keterangan Desain:</p>
                            <ul>
                                <li>Langsung Proses Cetak</li>
                            </ul>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Bahan</th>
                                    <th>Ukuran</th>
                                    <th>Jumlah</th>
                                    <th>Nama File</th>
                                    <th>Finishing</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="center">1</td>
                                    <td>Kertas HVS</td>
                                    <td>A4</td>
                                    <td>5</td>
                                    <td>poster.jpg </td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-12 invoice-amount">
                            <p><strong>Total:</strong> <span class="green font-size-17"><strong>Rp {{ number_format($total_harga) }}</strong></span></p>
                            <p><a class="btn btn-success btn-xlarge print-link no-print" href="{{ url("invoice/".$nota->id."/cetak") }}" target="_blank">Cetak</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection