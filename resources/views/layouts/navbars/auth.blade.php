<?php
$userLevel = auth()->user()->level;
?>
<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            {{ __('POS System') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            @if($userLevel != 'kasir' || $userLevel != 'partman')
            <li class="{{ $elementActive == 'pembelian' ? 'active' : '' }}">
                <a href="{{ route('pembelian.index') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Pembelian') }}</p>
                </a>
            </li>
            @endif
            @if($userLevel != 'kepala')
            <li class="{{ $elementActive == 'penjualan' ? 'active' : '' }}">
                <a href="{{ route('penjualan.index') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Penjualan') }}</p>
                </a>
            </li>
            @endif
            <li
                class="{{ $elementActive == 'laporanpembelian' || $elementActive == 'laporanpenjualan' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laporan">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                        {{ __('Laporan') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="laporan">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'laporanpembelian' ? 'active' : '' }}">
                            <a href="{{ route('laporanpembelian') }}">
                                <span class="sidebar-mini-icon">{{ __('LP') }}</span>
                                <span class="sidebar-normal">{{ __(' Laporan Pembelian ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'laporanpenjualan' ? 'active' : '' }}">
                            <a href="{{ route('laporanpenjualan') }}">
                                <span class="sidebar-mini-icon">{{ __('LP') }}</span>
                                <span class="sidebar-normal">{{ __(' Laporan Penjualan ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="{{ $elementActive == 'customer' || $elementActive == 'supplier' ||$elementActive == 'sukucadang' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#masterData">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                        Master Data
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="masterData">
                    <ul class="nav">
                        @if($userLevel != 'kasir' || $userLevel != 'partman')
                        <li class="{{ $elementActive == 'supplier' ? 'active' : '' }}">
                            <a href="{{ route('supplier.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('S') }}</span>
                                <span class="sidebar-normal">{{ __(' Supplier ') }}</span>
                            </a>
                        </li>
                        @endif
                        @if($userLevel != 'kepala')
                        <li class="{{ $elementActive == 'customer' ? 'active' : '' }}">
                            <a href="{{ route('customer.index') }}">
                                <span class="sidebar-mini-icon">{{ __('C') }}</span>
                                <span class="sidebar-normal">{{ __(' Customer ') }}</span>
                            </a>
                        </li>
                        @endif
                        <li class="{{ $elementActive == 'sukucadang' ? 'active' : '' }}">
                            <a href="{{ route('sukucadang.index') }}">
                                <span class="sidebar-mini-icon">{{ __('SC') }}</span>
                                <span class="sidebar-normal">{{ __(' Suku Cadang ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @if($userLevel == 'admin')
            <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                        {{ __('User Management') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            <!-- <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'map') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'notifications') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tables') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'typography') }}">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li> -->
        </ul>
    </div>
</div>
