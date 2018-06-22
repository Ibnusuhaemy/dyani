<ul class="nav nav-list">
	<li class="{{ Request::is('/') ? 'active' : '' }}">
	    <a href="{{ url('/') }}">
	        <i class="glyphicon glyphicon-home"></i>
	        <span>Dashboard</span>
	    </a>
	</li>
	<li class="{{ !Request::is('/laporan') && !Request::is('/') ? 'active' : '' }}">
	        <a href="#" class="dropdown-toggle">
	            <i class="fa fa-archive"></i>
	            <span>Master</span>
	            <b class="arrow fa fa-angle-right"></b>
	        </a>
	        <!-- BEGIN Submenu -->
	        <ul class="submenu">
	                    <li class="{{ Request::is('/pelanggan') ? 'active' : '' }}">
	                        <a href="{{ url('/pelanggan') }}">
	                            <i class="glyphicon glyphicon-user"></i>
	                            <span>Pelanggan</span>
	                        </a>
	                    </li>
	                    <li class="{{ Request::is('/pegawai') ? 'active' : '' }}">
	                        <a href="{{ url('/pegawai') }}">
	                            <i class="fa fa-users"></i>
	                            <span>Pegawai</span>
	                        </a>
	                    </li>
	                    <li class="{{ Request::is('/bahan-baku') ? 'active' : '' }}">
	                        <a href="{{ url('/bahan-baku') }}">
	                            <i class="glyphicon glyphicon-list-alt"></i>
	                            <span>Bahan Baku</span>
	                        </a>
	                    </li>
	                    <li class="{{ Request::is('/produk') ? 'active' : '' }}">
	                        <a href="{{ url('/produk') }}">
	                            <i class="glyphicon glyphicon-tasks"></i>
	                            <span>Produk</span>
	                        </a>
	                    </li>
	                    {{-- <li class="{{ Request::is('/tukuran') ? 'active' : '' }}">
	                        <a href="{{ url('/tukuran') }}">
	                            <i class="fa fa-tags"></i>
	                            <span>Ukuran</span>
	                        </a>
	                    </li> 
	                    <li class="{{ Request::is('/bank') ? 'active' : '' }}">
	                            <a href="{{ url('/bank') }}">
	                                <i class="fa fa-credit-card"></i>
	                                <span>Bank</span>
	                            </a>
	                    </li>
	                    <li class="{{ Request::is('/tsup') ? 'active' : '' }}">
	                        <a href="{{ url('/tsup') }}">
	                            <i class="fa fa-briefcase"></i>
	                            <span>Supplier</span>
	                        </a>
	                    </li> --}}
	        </ul>
	        <!-- END Submenu -->
	</li>
{{-- 	<li>
	    <a href="{{ url('/pemesanan') }}">
	        <i class="glyphicon glyphicon-user"></i>
	        <span>Pemesanan</span>
	    </a>
	</li> --}}
{{-- 	<li>
	    <a href="{{ url('/torder') }}">
	        <i class="fa fa-users"></i>
	        <span>Order Desain</span>
	    </a>
	</li> --}}
{{-- 	<li>
	    <a href="{{ url('/tproduksi') }}">
	        <i class="glyphicon glyphicon-list-alt"></i>
	        <span>Produksi</span>
	    </a>
	</li> --}}
{{-- 	<li>
	    <a href="{{ url('/ttransaksi') }}">
	        <i class="glyphicon glyphicon-tasks"></i>
	        <span>Transaksi Gudang</span>
	    </a>
	</li> --}}
	<li class="{{ Request::is('/laporan') ? 'active' : '' }}">
	    <a href="{{ url('/laporan') }}">
	        <i class="fa fa-tags"></i>
	        <span>Laporan Data</span>
	    </a>
	</li>
</ul>