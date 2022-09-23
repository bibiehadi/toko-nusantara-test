<nav id="sidebar">
            <div id="dismiss">
                <i class="fa fa-arrow-left"></i>
            </div>
            <div class="sidebar-header">
                <h3>Pipeline App</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="">
                    <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}"><i class="fa fa-th-large mr-2"></i> Dashboard</a>
                </li>
                <li class="">
                    <a href="/barang" class="{{ Request::is('barang') ? 'active' : '' }}"><i class="fa fa-th-large mr-2"></i> Barang</a>
                </li>
                <li class="">
                    <a href="/harga_barang" class="{{ Request::is('harga_barang') ? 'active' : '' }}"><i class="fa fa-th-large mr-2"></i> Harga Barang</a>
                </li>
                <li class="">
                    <a href="/transaksi" class="{{ Request::is('transaksi') ? 'active' : '' }}"><i class="fa fa-th-large mr-2"></i> Transaksi</a>
                </li>
                {{-- <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle dropdown-sidebar">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li> --}}
                
            </ul>
            
        </nav>
