<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('dashboard') }}" class="sidebar-logo">
            <img src="{{ asset('assets/images/logo_gif.gif') }}" alt="site logo" class="light-logo" />
            <img src="{{ asset('assets/images/logo_gif.gif') }}" alt="site logo" class="dark-logo" />
            <img src="{{ asset('assets/images/logo_siderbar.png') }}" alt="site logo" class="logo-icon" />
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-menu-group-title">Apps</li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="fluent:form-new-28-regular" class="menu-icon"></iconify-icon>
                    <span>Tambah</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('new') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Buku Baru</a>
                    </li>
                    <li>
                        <a href="{{ route('category') }}"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Kategori</a>
                    </li>
                    <li>
                        <a href="{{ route('rak') }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Rak Buku</a>
                    </li>
                    <li>
                        <a href="{{ route('sub') }}"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Sub Rak</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-menu-group-title">Application</li>
            <li>
                <a href="{{ route('books') }}">
                    <iconify-icon icon="mynaui:book-check" class="menu-icon"></iconify-icon>
                    <span>Daftar Buku</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pinjam') }}">
                    <iconify-icon icon="mdi:book-arrow-right-outline" class="menu-icon"></iconify-icon>
                    <span>Pinjam Buku</span>
                </a>
            </li>
            <li>
                <a href="{{ route('borrowing.table') }}">
                    <iconify-icon icon="mdi:book-arrow-left-outline" class="menu-icon"></iconify-icon>
                    <span>Kembali Buku</span>
                </a>
            </li>
            <li>
                <a href="{{ route('histori') }}">
                    <iconify-icon icon="mdi:history" class="menu-icon"></iconify-icon>
                    <span>Histori Buku</span>
                </a>
            </li>
            <li>
                <a href="{{ route('data.pengunjung') }}">
                    <iconify-icon icon="lsicon:user-crowd-outline" class="menu-icon"></iconify-icon>
                    <span>Data Pengunjung</span>
                </a>
            </li>
            <li>
                <a href="{{ route('export') }}">
                    <iconify-icon icon="lucide:file-up" class="menu-icon"></iconify-icon>
                    <span>Export</span>
                </a>
            </li>
            <!-- <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                    <span>Invoice</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="#"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            List</a>
                    </li>
                    <li>
                        <a href="#"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Preview</a>
                    </li>
                    <li>
                        <a href="#"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Add new</a>
                    </li>
                    <li>
                        <a href="#"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            Edit</a>
                    </li>
                </ul>
            </li>
        -->

            <li class="sidebar-menu-group-title">Application</li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('user.list') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Users List</a>
                    </li>
                    <li>
                        <a href="{{ route('user-profile') }}"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Add User</a>
                    </li>
                    <li>
                        <a href="{{ route('view-profile') }}"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            View Profile</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>Settings</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('durasi') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Durasi</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
