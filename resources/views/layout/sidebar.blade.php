{{--<li class=" nav-item"><a href="index.html"><i class="feather icon-home"></i><span class="menu-title"--}}
{{--                                                                                  data-i18n="Dashboard">Dashboard</span><span--}}
{{--            class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>--}}
{{--    <ul class="menu-content">--}}
{{--        <li class="active"><a href="dashboard-analytics.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                       data-i18n="Analytics">Analytics</span></a>--}}
{{--        </li>--}}
{{--        <li><a href="dashboard-ecommerce.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                        data-i18n="eCommerce">eCommerce</span></a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}

<li class=" navigation-header"><span>Cashier</span>
</li>
<li class=" nav-item"><a href="{{route('index')}}/">
        <i class="feather icon-home"></i>
        <span class="menu-title" data-i18n="Email">Dashboard</span>
    </a>
</li>

<li class=" navigation-header"><span>Master</span>
</li>
<li class="nav-item" ><a href="{{route('bahan.index')}}"><i class="feather icon-box"></i><span class="menu-title"
                                                                                                data-i18n="Email">Bahan</span></a>
</li>
<li class=" nav-item"><a href="{{route('produk.index')}}"><i class="feather icon-shopping-bag"></i><span
            class="menu-title" data-i18n="Chat">Produk</span></a>
</li>
<li class=" nav-item"><a href="{{route('toko.index')}}"><i class="feather icon-archive"></i><span
            class="menu-title" data-i18n="Chat">Toko</span></a>
</li>

{{-- management stok--}}
<li class=" navigation-header"><span>Stock Management</span>
</li>
<li class=" nav-item"><a href="app-email.html"><i class="feather icon-shopping-bag"></i>
        <span class="menu-title" data-i18n="Email">Stok</span></a>
</li>
{{-- end of management stock--}}

{{-- Laporan --}}
<li class=" navigation-header"><span>Report Management</span>
</li>
<li class=" nav-item"><a href="{{route('laporan.index')}}"><i class="feather icon-bar-chart"></i>
        <span class="menu-title" data-i18n="Email">Laporan</span></a>
</li>
{{----}}

<li class=" navigation-header"><span>User Management</span>
</li>
<li class=" nav-item"><a href="{{route('role.index')}}"><i class="feather icon-users"></i>
        <span class="menu-title" data-i18n="Email">Role</span></a>
</li>
<li class=" nav-item"><a href="{{route('users.index')}}"><i class="feather icon-mail"></i>
        <span class="menu-title" data-i18n="Email">User</span></a>
</li>
