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

                @can('faq-list')
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

                @can('user-list')
                <li>
                    <a href="{{ route('users.index') }}">
                        <div class="parent-icon"><i class='bx bx-menu'></i>
                        </div>
                        <div class="menu-title">{{ __('translation.Admins') }}</div>
                    </a>
                </li>
                @endcan

                {{--  <li>
                    <a href="{{ route('color.index') }}">
                        <div class="parent-icon"><i class='bx bx-color-fill'></i>
                        </div>
                        <div class="menu-title">{{ __('translation.Colors') }}</div>
                    </a>
                </li>
                 <li>
                    <a href="{{ route('size.index') }}">
                        <div class="parent-icon"><i class='bx bx-highlight'></i>
                        </div>
                        <div class="menu-title">{{ __('translation.Sizes') }}</div>
                    </a>
                </li>  --}}




                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-cart'></i>
                        </div>
                        <div class="menu-title">eCommerce</div>
                    </a>
                    <ul>
                        <li> <a href="ecommerce-products.html"><i class='bx bx-radio-circle'></i>Products</a>
                        </li>
                        <li> <a href="ecommerce-products-details.html"><i class='bx bx-radio-circle'></i>Product
                                Details</a>
                        </li>
                        <li> <a href="ecommerce-add-new-products.html"><i class='bx bx-radio-circle'></i>Add New
                                Products</a>
                        </li>
                        <li> <a href="ecommerce-orders.html"><i class='bx bx-radio-circle'></i>Orders</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                        </div>
                        <div class="menu-title">Components</div>
                    </a>
                    <ul>
                        <li> <a href="component-alerts.html"><i class='bx bx-radio-circle'></i>Alerts</a>
                        </li>
                        <li> <a href="component-accordions.html"><i class='bx bx-radio-circle'></i>Accordions</a>
                        </li>
                        <li> <a href="component-badges.html"><i class='bx bx-radio-circle'></i>Badges</a>
                        </li>
                        <li> <a href="component-buttons.html"><i class='bx bx-radio-circle'></i>Buttons</a>
                        </li>
                        <li> <a href="component-cards.html"><i class='bx bx-radio-circle'></i>Cards</a>
                        </li>
                        <li> <a href="component-carousels.html"><i class='bx bx-radio-circle'></i>Carousels</a>
                        </li>
                        <li> <a href="component-list-groups.html"><i class='bx bx-radio-circle'></i>List Groups</a>
                        </li>
                        <li> <a href="component-media-object.html"><i class='bx bx-radio-circle'></i>Media Objects</a>
                        </li>
                        <li> <a href="component-modals.html"><i class='bx bx-radio-circle'></i>Modals</a>
                        </li>
                        <li> <a href="component-navs-tabs.html"><i class='bx bx-radio-circle'></i>Navs & Tabs</a>
                        </li>
                        <li> <a href="component-navbar.html"><i class='bx bx-radio-circle'></i>Navbar</a>
                        </li>
                        <li> <a href="component-paginations.html"><i class='bx bx-radio-circle'></i>Pagination</a>
                        </li>
                        <li> <a href="component-popovers-tooltips.html"><i class='bx bx-radio-circle'></i>Popovers &
                                Tooltips</a>
                        </li>
                        <li> <a href="component-progress-bars.html"><i class='bx bx-radio-circle'></i>Progress</a>
                        </li>
                        <li> <a href="component-spinners.html"><i class='bx bx-radio-circle'></i>Spinners</a>
                        </li>
                        <li> <a href="component-notifications.html"><i
                                    class='bx bx-radio-circle'></i>Notifications</a>
                        </li>
                        <li> <a href="component-avtars-chips.html"><i class='bx bx-radio-circle'></i>Avatrs &
                                Chips</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-repeat"></i>
                        </div>
                        <div class="menu-title">Content</div>
                    </a>
                    <ul>
                        <li> <a href="content-grid-system.html"><i class='bx bx-radio-circle'></i>Grid System</a>
                        </li>
                        <li> <a href="content-typography.html"><i class='bx bx-radio-circle'></i>Typography</a>
                        </li>
                        <li> <a href="content-text-utilities.html"><i class='bx bx-radio-circle'></i>Text
                                Utilities</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                        </div>
                        <div class="menu-title">Icons</div>
                    </a>
                    <ul>
                        <li> <a href="icons-line-icons.html"><i class='bx bx-radio-circle'></i>Line Icons</a>
                        </li>
                        <li> <a href="icons-boxicons.html"><i class='bx bx-radio-circle'></i>Boxicons</a>
                        </li>
                        <li> <a href="icons-feather-icons.html"><i class='bx bx-radio-circle'></i>Feather Icons</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="form-froala-editor.html">
                        <div class="parent-icon"><i class='bx bx-code-alt'></i>
                        </div>
                        <div class="menu-title">Froala Editor</div>
                    </a>
                </li>
                <li class="menu-label">Forms & Tables</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                        </div>
                        <div class="menu-title">Forms</div>
                    </a>
                    <ul>
                        <li> <a href="form-elements.html"><i class='bx bx-radio-circle'></i>Form Elements</a>
                        </li>
                        <li> <a href="form-input-group.html"><i class='bx bx-radio-circle'></i>Input Groups</a>
                        </li>
                        <li> <a href="form-radios-and-checkboxes.html"><i class='bx bx-radio-circle'></i>Radios &
                                Checkboxes</a>
                        </li>
                        <li> <a href="form-layouts.html"><i class='bx bx-radio-circle'></i>Forms Layouts</a>
                        </li>
                        <li> <a href="form-validations.html"><i class='bx bx-radio-circle'></i>Form Validation</a>
                        </li>
                        <li> <a href="form-wizard.html"><i class='bx bx-radio-circle'></i>Form Wizard</a>
                        </li>
                        <li> <a href="form-text-editor.html"><i class='bx bx-radio-circle'></i>Text Editor</a>
                        </li>
                        <li> <a href="form-file-upload.html"><i class='bx bx-radio-circle'></i>File Upload</a>
                        </li>
                        <li> <a href="form-date-time-pickes.html"><i class='bx bx-radio-circle'></i>Date Pickers</a>
                        </li>
                        <li> <a href="form-select2.html"><i class='bx bx-radio-circle'></i>Select2</a>
                        </li>
                        <li> <a href="form-repeater.html"><i class='bx bx-radio-circle'></i>Form Repeater</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                        </div>
                        <div class="menu-title">Tables</div>
                    </a>
                    <ul>
                        <li> <a href="table-basic-table.html"><i class='bx bx-radio-circle'></i>Basic Table</a>
                        </li>
                        <li> <a href="table-datatable.html"><i class='bx bx-radio-circle'></i>Data Table</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-label">Pages</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-lock"></i>
                        </div>
                        <div class="menu-title">Authentication</div>
                    </a>
                    <ul>
                        <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Basic</a>
                            <ul>
                                <li><a href="auth-basic-signin.html" target="_blank"><i
                                            class='bx bx-radio-circle'></i>Sign In</a></li>
                                <li><a href="auth-basic-signup.html" target="_blank"><i
                                            class='bx bx-radio-circle'></i>Sign Up</a></li>
                                <li><a href="auth-basic-forgot-password.html" target="_blank"><i
                                            class='bx bx-radio-circle'></i>Forgot Password</a></li>
                                <li><a href="auth-basic-reset-password.html" target="_blank"><i
                                            class='bx bx-radio-circle'></i>Reset Password</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Cover</a>
                            <ul>
                                <li><a href="auth-cover-signin.html" target="_blank"><i
                                            class='bx bx-radio-circle'></i>Sign In</a></li>
                                <li><a href="auth-cover-signup.html" target="_blank"><i
                                            class='bx bx-radio-circle'></i>Sign Up</a></li>
                                <li><a href="auth-cover-forgot-password.html" target="_blank"><i
                                            class='bx bx-radio-circle'></i>Forgot Password</a></li>
                                <li><a href="auth-cover-reset-password.html" target="_blank"><i
                                            class='bx bx-radio-circle'></i>Reset Password</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>With Header
                                Footer</a>
                            <ul>
                                <li><a href="auth-header-footer-signin.html" target="_blank"><i
                                            class='bx bx-radio-circle'></i>Sign In</a></li>
                                <li><a href="auth-header-footer-signup.html" target="_blank"><i
                                            class='bx bx-radio-circle'></i>Sign Up</a></li>
                                <li><a href="auth-header-footer-forgot-password.html" target="_blank"><i
                                            class='bx bx-radio-circle'></i>Forgot Password</a></li>
                                <li><a href="auth-header-footer-reset-password.html" target="_blank"><i
                                            class='bx bx-radio-circle'></i>Reset Password</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="user-profile.html">
                        <div class="parent-icon"><i class="bx bx-user-circle"></i>
                        </div>
                        <div class="menu-title">User Profile</div>
                    </a>
                </li>
                <li>
                    <a href="timeline.html">
                        <div class="parent-icon"> <i class="bx bx-video-recording"></i>
                        </div>
                        <div class="menu-title">Timeline</div>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-error"></i>
                        </div>
                        <div class="menu-title">Errors</div>
                    </a>
                    <ul>
                        <li> <a href="errors-404-error.html" target="_blank"><i class='bx bx-radio-circle'></i>404
                                Error</a>
                        </li>
                        <li> <a href="errors-500-error.html" target="_blank"><i class='bx bx-radio-circle'></i>500
                                Error</a>
                        </li>
                        <li> <a href="errors-coming-soon.html" target="_blank"><i
                                    class='bx bx-radio-circle'></i>Coming Soon</a>
                        </li>
                        <li> <a href="error-blank-page.html" target="_blank"><i class='bx bx-radio-circle'></i>Blank
                                Page</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="faq.html">
                        <div class="parent-icon"><i class="bx bx-help-circle"></i>
                        </div>
                        <div class="menu-title">FAQ</div>
                    </a>
                </li>
                <li>
                    <a href="pricing-table.html">
                        <div class="parent-icon"><i class="bx bx-diamond"></i>
                        </div>
                        <div class="menu-title">Pricing</div>
                    </a>
                </li>
                <li class="menu-label">Charts & Maps</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-line-chart"></i>
                        </div>
                        <div class="menu-title">Charts</div>
                    </a>
                    <ul>
                        <li> <a href="charts-apex-chart.html"><i class='bx bx-radio-circle'></i>Apex</a>
                        </li>
                        <li> <a href="charts-chartjs.html"><i class='bx bx-radio-circle'></i>Chartjs</a>
                        </li>
                        <li> <a href="charts-highcharts.html"><i class='bx bx-radio-circle'></i>Highcharts</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-map-alt"></i>
                        </div>
                        <div class="menu-title">Maps</div>
                    </a>
                    <ul>
                        <li> <a href="map-google-maps.html"><i class='bx bx-radio-circle'></i>Google Maps</a>
                        </li>
                        <li> <a href="map-vector-maps.html"><i class='bx bx-radio-circle'></i>Vector Maps</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-label">Others</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-menu"></i>
                        </div>
                        <div class="menu-title">Menu Levels</div>
                    </a>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level One</a>
                            <ul>
                                <li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level
                                        Two</a>
                                    <ul>
                                        <li> <a href="javascript:;"><i class='bx bx-radio-circle'></i>Level Three</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="https://codervent.com/rocker/documentation/index.html" target="_blank">
                        <div class="parent-icon"><i class="bx bx-folder"></i>
                        </div>
                        <div class="menu-title">Documentation</div>
                    </a>
                </li>
                <li>
                    <a href="https://themeforest.net/user/codervent" target="_blank">
                        <div class="parent-icon"><i class="bx bx-support"></i>
                        </div>
                        <div class="menu-title">Support</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
