<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar" style="margin-top: 15px;">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
                    href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard" style="color: #3f51b5;"></i>
                        <span class="hide-menu" style="color: {{ request()->routeIs('dashboard') ? '#ffffff' : '#3f51b5' }}; font-weight: {{ request()->routeIs('dashboard') ? '700' : '550' }};">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('indexProduk') ? 'active' : '' }}" 
                       href="{{ route('indexProduk') }}" aria-expanded="false">
                        <i class="mdi mdi-store" style="color: #3f51b5;"></i>
                        <span class="hide-menu" style="color: {{ request()->routeIs('indexProduk') ? '#ffffff' : '#3f51b5' }}; font-weight: {{ request()->routeIs('indexProduk') ? '700' : '550' }};">Product</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('pembelian') ? 'active' : '' }}" 
                       href="{{ route('pembelian') }}" aria-expanded="false">
                        <i class="mdi mdi-border-all" style="color: #3f51b5;"></i>
                        <span class="hide-menu" style="color: {{ request()->routeIs('pembelian') ? '#ffffff' : '#3f51b5' }}; font-weight: {{ request()->routeIs('pembelian') ? '700' : '550' }};">Sale</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('user.index') ? 'active' : '' }}" 
                       href="{{ route('user.index') }}" aria-expanded="false">
                        <i class="mdi mdi-account-multiple" style="color: #3f51b5;"></i>
                        <span class="hide-menu" style="color: {{ request()->routeIs('user.index') ? '#ffffff' : '#3f51b5' }}; font-weight: {{ request()->routeIs('user.index') ? '700' : '550' }};">User</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('drug.index') ? 'active' : '' }}" 
                    href="{{ route('drug.index') }}" aria-expanded="false"
                    style="{{ request()->routeIs('drug.index') ? 'background-color: #d32f2f !important;' : '' }}">
                        
                        <i class="mdi mdi-pill" style="color: {{ request()->routeIs('drug.index') ? '#ffffff' : '#d32f2f' }};"></i>
                        
                        <span class="hide-menu" style="color: {{ request()->routeIs('drug.index') ? '#ffffff' : '#d32f2f' }}; font-weight: {{ request()->routeIs('drug.index') ? '700' : '550' }};">Drug List</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <hr class="sidebar-divider" style="margin: 10px 20px; border-top: 1px solid #ddd;">
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                       href="{{ route('shop.index') }}" target="_blank" aria-expanded="false">
                        <i class="mdi mdi-earth" style="color: #3f51b5;"></i>
                        <span class="hide-menu" style="color: #3f51b5; font-weight: 700;">View Shop</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>