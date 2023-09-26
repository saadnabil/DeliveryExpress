<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ url('dashboard/assets/images/logo-img.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 style="font-size:16px;" class="logo-text">{{ __('translation.Delivery Express') }}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="menu-label">{{ __('translation.Delivery Express') }}</li>

        @can('role-list')
            <li>
                <a href="{{ route('roles.index') }}">
                    <div class="parent-icon"><i class='bx bx-door-open'></i>
                    </div>
                    <div class="menu-title">{{ __('translation.Roles') }}</div>
                </a>
            </li>
        @endcan

        @can('shipment-list')
            <li>
                <a href="{{ route('shipments.index') }}">
                    <div class="parent-icon"><i class='bx bx-door-open'></i>
                    </div>
                    <div class="menu-title">{{ __('translation.Shipments') }}</div>
                </a>
            </li>
        @endcan

        @can('city-list')
            <li>
                <a href="{{ route('cities.index') }}">
                    <div class="parent-icon"><i class='bx bx-cart'></i>
                    </div>
                    <div class="menu-title">{{ __('translation.Cities') }}</div>
                </a>
            </li>
        @endcan

        @can('activity-list')
            <li>
                <a href="{{ route('activities.index') }}">
                    <div class="parent-icon"><i class='bx bx-menu'></i>
                    </div>
                    <div class="menu-title">{{ __('translation.Activities') }}</div>
                </a>
            </li>
        @endcan

        @can('cancelReason-list')
            <li>
                <a href="{{ route('cancelReasons.index') }}">
                    <div class="parent-icon"><i class='bx bx-menu'></i>
                    </div>
                    <div class="menu-title">{{ __('translation.Cancel Reasons') }}</div>
                </a>
            </li>
        @endcan

        @can('coupon-list')
            <li>
                <a href="{{ route('coupons.index') }}">
                    <div class="parent-icon"><i class='bx bx-menu'></i>
                    </div>
                    <div class="menu-title">{{ __('translation.Coupons') }}</div>
                </a>
            </li>
        @endcan

        @can('faq-list')
            <li>
                <a href="{{ route('faqs.index') }}">
                    <div class="parent-icon"><i class='bx bx-menu'></i>
                    </div>
                    <div class="menu-title">{{ __('translation.Questions') }}</div>
                </a>
            </li>
        @endcan

        @can('complains-list')
            <li>
                <a href="{{ route('complains.index') }}">
                    <div class="parent-icon"><i class='bx bx-menu'></i>
                    </div>
                    <div class="menu-title">{{ __('translation.Complains') }}</div>
                </a>
            </li>
        @endcan

        @can('store-list')
            <li>
                <a href="{{ route('stores.index') }}">
                    <div class="parent-icon"><i class='bx bx-menu'></i>
                    </div>
                    <div class="menu-title">{{ __('translation.Stores') }}</div>
                </a>
            </li>
        @endcan

        @can('delivery-list')
            <li>
                <a href="{{ route('deliveries.index') }}">
                    <div class="parent-icon"><i class='bx bx-menu'></i>
                    </div>
                    <div class="menu-title">{{ __('translation.Deliveries') }}</div>
                </a>
            </li>
        @endcan

        @can('user-list')
            <li>
                <a href="{{ route('users.index') }}">
                    <div class="parent-icon"><i class='bx bx-menu'></i>
                    </div>
                    <div class="menu-title">{{ __('translation.Admins') }}</div>
                </a>
            </li>
        @endcan

        @can('setting-list')
            <li>
                <a href="{{ route('settings.index') }}">
                    <div class="parent-icon"><i class='bx bx-menu'></i>
                    </div>
                    <div class="menu-title">{{ __('translation.Setting') }}</div>
                </a>
            </li>
        @endcan

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
