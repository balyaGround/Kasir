{{--<li class=" navigation-header"><span>Cashier</span>--}}
{{--</li>--}}
{{--<li class=" nav-item"><a href="{{route('index')}}/">--}}
{{--        <i class="feather icon-home"></i>--}}
{{--        <span class="menu-title" data-i18n="Email">Dashboard</span>--}}
{{--    </a>--}}
{{--</li>--}}

{{--<li class=" navigation-header"><span>Master</span>--}}
{{--</li>--}}
{{--<li class="nav-item" ><a href="{{route('bahan.index')}}"><i class="feather icon-box"></i><span class="menu-title"--}}
{{--                                                                                                data-i18n="Email">Bahan</span></a>--}}
{{--</li>--}}
{{--<li class=" nav-item"><a href="{{route('produk.index')}}"><i class="feather icon-shopping-bag"></i><span--}}
{{--            class="menu-title" data-i18n="Chat">Produk</span></a>--}}
{{--</li>--}}
{{--<li class=" nav-item"><a href="{{route('toko.index')}}"><i class="feather icon-archive"></i><span--}}
{{--            class="menu-title" data-i18n="Chat">Toko</span></a>--}}
{{--</li>--}}

{{-- management stok--}}
{{--<li class=" navigation-header"><span>Stock Management</span>--}}
{{--</li>--}}
{{--<li class=" nav-item"><a href="app-email.html"><i class="feather icon-shopping-bag"></i>--}}
{{--        <span class="menu-title" data-i18n="Email">Stok</span></a>--}}
{{--</li>--}}
{{-- end of management stock--}}

{{-- Laporan --}}
{{--<li class=" navigation-header"><span>Report Management</span>--}}
{{--</li>--}}
{{--<li class=" nav-item"><a href="{{route('laporan.index')}}"><i class="feather icon-bar-chart"></i>--}}
{{--        <span class="menu-title" data-i18n="Email">Laporan</span></a>--}}
{{--</li>--}}
{{----}}

{{--<li class=" navigation-header"><span>User Management</span>--}}
{{--</li>--}}
{{--<li class=" nav-item"><a href="{{route('role.index')}}"><i class="feather icon-users"></i>--}}
{{--        <span class="menu-title" data-i18n="Email">Role</span></a>--}}
{{--</li>--}}


<li class=" nav-item text-center mb-1 px-0"><a href="{{route('index')}}/">

        <div class="row mx-0 px-0">
            <div class="col-12">
                <i class="feather icon-home"></i>
            </div>
        </div>
        <span class="menu-title">Home</span></a>
</li>
<li class=" nav-item text-center mb-1  px-0"><a href="{{route('report.today')}}">

        <div class="row mx-0 px-0">
            <div class="col-12">
                <i class="feather icon-bar-chart"></i>
            </div>
        </div>
        <span class="menu-title">Laporan</span></a>
</li>



<li class="nav-item text-center mb-1 px-0" >
    <a href="{{route('barang')}}">
        <div class="row mx-0 px-0 margin-side">
            <div class="col-12">
                <i class="feather icon-shopping-bag"></i>
            </div>
        </div>
        <span class="menu-title" data-i18n="Email">Barang</span>
    </a>
</li>

<li class=" nav-item text-center px-0"><a href="{{route('settings')}}">

        <div class="row mx-0 px-0 margin-side">
            <div class="col-12">
                <i class="feather icon-settings"></i>
            </div>
        </div>
        <span class="menu-title" data-i18n="Email">Settings</span></a>
</li>

