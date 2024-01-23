{{-- {{ request()->routeIs('dashboard') }} --}}
<ul class="metismenu" id="menu">
    <li>
        <a href="{{ route('dashboard') }}">
            <div class="parent-icon"><i class='bx bx-home'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li class="menu-label">User Panel</li>
    <li>
        <a href="#">
            <div class="parent-icon">
                <i class='bx bx-briefcase-alt-2'></i>
            </div>
            <div class="menu-title">Task</div>
        </a>
    </li>
    {{-- <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
                <i class='bx bx-cart-alt' ></i>
            </div>
            <div class="menu-title">eCommerce</div>
        </a>
        <ul>
            <li>
                <a href="ecommerce-products.html"><i class="bx bx-right-arrow-alt"></i>Products</a>
            </li>
            <li>
                <a href="ecommerce-products-details.html"><i class="bx bx-right-arrow-alt"></i>Product Details</a>
            </li>
        </ul>
    </li> --}}
</ul>
