<?php
function shouldHasActive($route)
{
    $current = \Illuminate\Support\Facades\Route::currentRouteName();
    return $current == $route ? 'active' : '';
}

$user = Auth::user();

?>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard.index') }}">GudangKu</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard.index') }}">GK</a>
        </div>
        <ul class="sidebar-menu">
{{--            @if ($role->name != \App\Utils\RoleUtil::NAME_MARKETPLACEADMIN)--}}
            <li class="nav-item {{ shouldHasActive('dashboard.index') }}">
                <a href="{{ route('dashboard.index') }}" class="nav-link"><i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Features</li>
            <li class="nav-item {{ shouldHasActive('dashboard.balance.index') }}">
                <a href="{{ route('dashboard.balance.index') }}" class="nav-link active"><i class="fas fa-box"></i>
                    <span>Transaksi</span></a>
            </li>
            <li class="nav-item dropdown {{ shouldHasActive('dashboard.master.item') }}">
                <a href="#" class="nav-link has-dropdown {{ shouldHasActive('dashboard.master.item') }}"><i class="fas fa-boxes"></i> <span>Barang</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link {{ shouldHasActive('dashboard.master.item') }}" href="{{ route('dashboard.master.item') }}">Master Barang</a></li>
                    <li><a class="nav-link {{ shouldHasActive('dashboard.item.index') }}" href="{{ route('dashboard.item.index') }}">Barang Masuk</a></li>
                    <li><a class="nav-link {{ shouldHasActive('dashboard.item.out') }}" href="{{ route('dashboard.item.out') }}">Barang Keluar</a></li>
                </ul>
            </li>
{{--            <li class="nav-item {{ shouldHasActive('dashboard.sales.index') }}">--}}
{{--                <a href="{{ route('dashboard.sales.index') }}" class="nav-link active"><i class="fas fa-poll"></i>--}}
{{--                    <span>Barang</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.exchange.index') }}">--}}
{{--                <a href="{{ route('dashboard.exchange.index') }}" class="nav-link"><i class="fas fa-archive"></i> <span>Exchanges</span></a>--}}
{{--            </li>--}}
{{--            <li class="menu-header">Content</li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.faq.index') }}">--}}
{{--                <a href="{{ route('dashboard.faq.index') }}" class="nav-link"><i class="fas fa-question-circle"></i>--}}
{{--                    <span>FAQ</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.news.index') }}">--}}
{{--                <a href="{{ route('dashboard.news.index') }}" class="nav-link"><i class="fas fa-bell"></i>--}}
{{--                    <span>News</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.prize.index') }}">--}}
{{--                <a href="{{ route('dashboard.prize.index') }}" class="nav-link"><i class="fas fa-gift"></i>--}}
{{--                    <span>Prizes</span></a>--}}
{{--            </li>--}}
{{--            <li class="menu-header">Marketplace</li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.sales.index') }}">--}}
{{--                <a href="{{ route('dashboard.sales.index') }}" class="nav-link"><i class="fas fa-money-bill-alt"></i>--}}
{{--                    <span>Transactions</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.item.index') }}">--}}
{{--                <a href="{{ route('dashboard.item.index') }}" class="nav-link"><i class="fas fa-box-open"></i>--}}
{{--                    <span>Products</span></a>--}}
{{--            </li>--}}
{{--            <li class="menu-header">Settings</li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.setting.index') }}">--}}
{{--                <a href="{{ route('dashboard.setting.index') }}" class="nav-link"><i class="fas fa-cog"></i> <span>App. Settings</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.setting.index.sms') }}">--}}
{{--                <a href="{{ route('dashboard.setting.index.sms') }}" class="nav-link"><i class="fas fa-envelope"></i>--}}
{{--                    <span>SMS Settings</span></a>--}}
{{--            </li>--}}
{{--            <li class="menu-header">Others</li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.user-management.index') }}">--}}
{{--                <a href="{{ route('dashboard.admin.index') }}" class="nav-link"><i class="fas fa-users"></i> <span>Admin Management</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.other.blacklist.index') }}">--}}
{{--                <a href="{{ route('dashboard.other.blacklist.index') }}" class="nav-link"><i class="fas fa-credit-card"></i><span>Blacklist</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.other.otp.index') }}">--}}
{{--                <a href="{{ route('dashboard.other.otp.index') }}" class="nav-link"><i class="fas fa-envelope"></i>--}}
{{--                    <span>OTPs</span></a>--}}
{{--            </li>--}}
{{--            @else--}}
{{--            <li class="menu-header text-center">Marketplace</li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.sales.index') }}">--}}
{{--                <a href="{{ route('dashboard.sales.index') }}" class="nav-link"><i class="fas fa-money-bill-alt"></i>--}}
{{--                    <span>Transactions</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ shouldHasActive('dashboard.item.index') }}">--}}
{{--                <a href="{{ route('dashboard.item.index') }}" class="nav-link"><i class="fas fa-box-open"></i>--}}
{{--                    <span>Products</span></a>--}}
{{--            </li>--}}
{{--            @endif--}}
        </ul>
    </aside>
</div>
