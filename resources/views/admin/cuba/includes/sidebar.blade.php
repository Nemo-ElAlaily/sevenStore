<div class="sidebar-wrapper">
   <div>
      <div class="logo-wrapper">
         <a href="{{ route('admin.index') }}" data-bs-original-title="" title="">
         <img class="img-fluid for-light" src="{{ $site_settings -> logo_path }}"  alt="{{ $site_settings -> title }}">
         <img class="img-fluid for-dark" src="{{ $site_settings -> logo_path }}"  alt="{{ $site_settings -> title }}">
         </a>
         <div class="back-btn"><i class="fa fa-angle-left"></i></div>
         <div class="toggle-sidebar" checked="checked">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid status_toggle middle sidebar-toggle">
               <rect x="3" y="3" width="7" height="7"></rect>
               <rect x="14" y="3" width="7" height="7"></rect>
               <rect x="14" y="14" width="7" height="7"></rect>
               <rect x="3" y="14" width="7" height="7"></rect>
            </svg>
         </div>
      </div>
      <div class="logo-icon-wrapper">
         <a href="{{ route('admin.index') }}" data-bs-original-title="" title="{{ $site_settings -> title }}">
         <img class="img-fluid" src="{{ $site_settings -> logo_path }}" style="height: 40px;" alt="{{ $site_settings -> title }}">
         </a>
      </div>
      <nav class="sidebar-main">
         <div class="left-arrow disabled" id="left-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
               <line x1="19" y1="12" x2="5" y2="12"></line>
               <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
         </div>
         <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar" data-simplebar="init">
               <div class="simplebar-wrapper" style="margin: 0px;">
                  <div class="simplebar-height-auto-observer-wrapper">
                     <div class="simplebar-height-auto-observer"></div>
                  </div>
                  <div class="simplebar-mask">
                     <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                           <div class="simplebar-content" style="padding: 0px;">
                              <li class="back-btn">
                                 <a href="{{ route('admin.index') }}" data-bs-original-title="" title="{{ $site_settings -> title }}">
                                 <img class="img-fluid" src="{{ $site_settings -> logo_path }}" style="height: 40px;" alt="{{ $site_settings -> title }}">
                                 </a>
                                 <div class="mobile-back text-end">
                                    <span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                                 </div>
                              </li>
                              <li class="sidebar-main-title">
                                 <div>
                                    <h6 class="lan-1">
                                       <i class="fa fa-home fa-lg"></i>
                                       Dashboard
                                    </h6>
                                 </div>
                              </li>
                              @if (auth()->user()->hasPermission('users_read'))
                              <li class="sidebar-list">
                                 <label class="badge badge-danger"></label>
                                 <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/users' ? 'active' : '' }}" href="#">
                                    <i class="nav-icon fa fa-user"></i>
                                    <span>Admin Setting</span>
                                    <div class="according-menu">
                                       <i class="fa fa-angle-{{request()->route()->getPrefix() == '/users' ? 'down' : 'right' }}"></i>
                                    </div>
                                 </a>
                                 <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/users' ? 'block;' : 'none;' }}">

                                        {{-- Admin --}}
                                        <li>
                                       <a class="submenu-title" href="#" data-bs-original-title="" title="">
                                        <i class="nav-icon fa fa-user"></i>

                                          Admin
                                          <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                       </a>
                                       <ul class="nav-sub-childmenu submenu-content" style="display: {{ request()->route()->getPrefix() == '/vendors' ? 'block;' : 'none;' }}">
                                          <li><a href="" class="">Admins</a></li>
                                          <li><a href="" class="">Shop Manger</a></li>
                                          <li><a href="" class="">Moderator</a></li>
                                       </ul>
                                    </li>

                                  {{-- Users --}}
                                    <li>

                                       <a class="submenu-title" href="#" data-bs-original-title="" title="">
                                        <i class="nav-icon fa fa-users"></i>

                                          Users
                                          <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                       </a>
                                       <ul class="nav-sub-childmenu submenu-content" style="display: {{ request()->route()->getPrefix() == '/vendors' ? 'block;' : 'none;' }}">
                                          <li><a href="{{route('admin.users.index')}}" class="{{ Route::currentRouteName()=='admin.users.index' ? 'active' : '' }}">All</a></li>
                                          <li><a href="{{route('admin.users.create')}}" class="{{ Route::currentRouteName()=='admin.users.create' ? 'active' : '' }}">Create User</a></li>
                                       </ul>
                                    </li>
                           @endif
                                    {{-- Vendors --}}
                            @if (auth()->user()->hasPermission('vendors_read'))
                                    <li>
                                       <a class="submenu-title" href="#" data-bs-original-title="" title="">
                                        <i class="nav-icon fa fa-user-plus"></i>

                                          Vendors
                                          <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                       </a>
                                       <ul class="nav-sub-childmenu submenu-content" style="display: {{ request()->route()->getPrefix() == '/vendors' ? 'block;' : 'none;' }}">
                                    <li><a href="{{route('admin.vendors.index')}}" class="{{ Route::currentRouteName()=='admin.vendors.index' ? 'active' : '' }}">All</a></li>
                                    <li><a href="{{route('admin.users.create')}}" class="{{ Route::currentRouteName()=='admin.vendors.create' ? 'active' : '' }}">Create Vendor</a></li>
                                       </ul>
                                    </li>
                                 </ul>
                              </li>

                            @endif



                              @if (auth()->user()->hasPermission('products_read'))
                              <li class="sidebar-list">
                                <label class="badge badge-danger"></label>
                                <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/users' ? 'active' : '' }}" href="#">
                                   <i class="nav-icon fa fa-shopping-cart"></i>
                                   <span>Store</span>
                                   <div class="according-menu">
                                      <i class="fa fa-angle-{{request()->route()->getPrefix() == '/users' ? 'down' : 'right' }}"></i>
                                   </div>
                                </a>
                                <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/users' ? 'block;' : 'none;' }}">

                                       {{-- Products --}}
                                       <li>

                                          <a class="submenu-title" href="#" data-bs-original-title="" title="">
                                           <i class="nav-icon fa-product-hunt"></i>

                                             Products
                                             <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                          </a>
                                          <ul class="nav-sub-childmenu submenu-content" style="display: {{ request()->route()->getPrefix() == '/vendors' ? 'block;' : 'none;' }}">
                                             <li><a href="{{route('admin.products.index')}}" class="{{ Route::currentRouteName()=='admin.products.index' ? 'active' : '' }}">All</a></li>
                                             <li><a href="{{route('admin.products.create')}}" class="{{ Route::currentRouteName()=='admin.products.create' ? 'active' : '' }}">Create User</a></li>
                                          </ul>
                                       </li>


                                       {{-- Main Category --}}
                                       <li>

                                          <a class="submenu-title" href="#" data-bs-original-title="" title="">
                                           <i class="nav-icon fa fa-puzzle-piece"></i>

                                           Main Categories
                                           <div class="according-menu">
                                             <i class="fa fa-angle-{{request()->route()->getPrefix() == '/main_categories' ? 'down' : 'right' }}"></i>
                                          </div>                                          </a>
                                          <ul class="nav-sub-childmenu submenu-content" style="display: {{ request()->route()->getPrefix() == '/vendors' ? 'block;' : 'none;' }}">
                                             <li><a href="{{route('admin.main_categories.index')}}" class="{{ Route::currentRouteName()=='admin.main_categories.index' ? 'active' : '' }}">All</a></li>
                                             <li><a href="{{route('admin.main_categories.create')}}" class="{{ Route::currentRouteName()=='admin.main_categories.create' ? 'active' : '' }}">Create Category</a></li>
                                          </ul>
                                       </li>

                                       <li>
                                          <a class="submenu-title " href="#" data-bs-original-title="" title="">
                                             <i class="nav-icon fa fa-ship"></i>

                                             Shipping
                                             <div class="according-menu">
                                               <i class="fa fa-angle-{{request()->route()->getPrefix() == 'admin/currencies' ? 'down' : 'right' }}"></i>
                                            </div>                                          </a>
                                          <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == 'admin/currencies' ? 'block;' : 'none;' }}">
                                            {{-- Currencies --}}
                                            <li>
                                             <a class="submenu-title" href="#" data-bs-original-title="" title="">
                                                 <i class="nav-icon fa fa-money"></i>
                                                   Currencies
                                                   <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                                </a>
                                                <ul class="nav-sub-childmenu submenu-content" style="display: {{ request()->route()->getPrefix() == 'admin/currencies' ? 'block;' : 'none;' }}">
                                                 <li><a href="{{route('admin.currencies.index')}}" class="{{ Route::currentRouteName()=='admin.currencies.index' ? 'active' : '' }}">All</a></li>
                                                 <li><a href="{{route('admin.currencies.create')}}" class="{{ Route::currentRouteName()=='admin.currencies.create' ? 'active' : '' }}">Add Currency</a></li>
                                                </ul>
                                             </li>
                                            {{-- Countries --}}
                                            <li>
                                             <a class="submenu-title" href="#" data-bs-original-title="" title="">
                                                 <i class="nav-icon fa fa-globe"></i>
                                                   Countries
                                             <div class="according-menu">
                                                <i class="fa fa-angle-{{request()->route()->getPrefix() == 'admin/countries' ? 'down' : 'right' }}"></i>
                                             </div>                                       </a>
                                                <ul class="nav-sub-childmenu submenu-content" style="display: {{ request()->route()->getPrefix() == '/main_categories' ? 'block;' : 'none;' }}">
                                             <li><a href="{{route('admin.countries.index')}}" class="{{ Route::currentRouteName()=='admin.countries.index' ? 'active' : '' }}">All</a></li>
                                             <li><a href="{{route('admin.countries.create')}}" class="{{ Route::currentRouteName()=='admin.countries.create' ? 'active' : '' }}">Add Country</a></li>
                                                </ul>
                                             </li>
                                            {{-- Cities --}}
                                            <li>
                                             <a class="submenu-title" href="#" data-bs-original-title="" title="">
                                                 <i class="nav-icon fa fa-globe"></i>
                                                   Cities
                                             <div class="according-menu">
                                                <i class="fa fa-angle-{{request()->route()->getPrefix() == 'admin/cities' ? 'down' : 'right' }}"></i>
                                             </div>                                       </a>
                                                <ul class="nav-sub-childmenu submenu-content" style="display: {{ request()->route()->getPrefix() == '/main_categories' ? 'block;' : 'none;' }}">
                                             <li><a href="{{route('admin.cities.index')}}" class="{{ Route::currentRouteName()=='admin.cities.index' ? 'active' : '' }}">All</a></li>
                                             <li><a href="{{route('admin.cities.create')}}" class="{{ Route::currentRouteName()=='admin.cities.create' ? 'active' : '' }}">Add City</a></li>
                                                </ul>
                                             </li>
                                            {{-- Regions --}}
                                            <li>
                                             <a class="submenu-title" href="#" data-bs-original-title="" title="">
                                                 <i class="nav-icon fa fa-globe"></i>
                                                   Regions
                                             <div class="according-menu">
                                                <i class="fa fa-angle-{{request()->route()->getPrefix() == 'admin/regions' ? 'down' : 'right' }}"></i>
                                             </div>                                     </a>
                                                <ul class="nav-sub-childmenu submenu-content" style="display: {{ request()->route()->getPrefix() == '/main_categories' ? 'block;' : 'none;' }}">
                                             <li><a href="{{route('admin.regions.index')}}" class="{{ Route::currentRouteName()=='admin.regions.index' ? 'active' : '' }}">All</a></li>
                                             <li><a href="{{route('admin.regions.create')}}" class="{{ Route::currentRouteName()=='admin.regions.create' ? 'active' : '' }}">Add City</a></li>
                                                </ul>
                                             </li>

                                             <li>
                                                <a class="submenu-title" href="#" data-bs-original-title="" title="">
                                                    <i class="nav-icon fa fa-sort"></i>
                                                      Orders
                                                <div class="according-menu">
                                                   <i class="fa fa-angle-{{request()->route()->getPrefix() == 'admin/regions' ? 'down' : 'right' }}"></i>
                                                </div>                                     </a>
                                                   <ul class="nav-sub-childmenu submenu-content" style="display: {{ request()->route()->getPrefix() == '/main_categories' ? 'block;' : 'none;' }}">
                                                      <li><a href="{{route('admin.orders.index')}}" class="{{ Route::currentRouteName()=='admin.orders.index' ? 'active' : '' }}">All</a></li>
                                                      <li><a href="#" class="">Completed Orders</a></li>
                                                      <li><a href="#" class="#">Cancelled Orders</a></li>
                                                </ul>
                                                </li>

                                          </ul>
                                       </li>

                                 </ul>


                              </li>


                              @endif


                              <li class="sidebar-list">
                                 <label class="badge badge-danger"></label>
                                 <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/seo-tools' ? 'active' : '' }}" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay">
                                       <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                                       <polygon points="12 15 17 21 7 21 12 15"></polygon>
                                    </svg>
                                    <span>SEO Tools</span>
                                    <div class="according-menu">
                                       <i class="fa fa-angle-{{request()->route()->getPrefix() == '/seo-tools' ? 'down' : 'right' }}"></i>
                                    </div>
                                 </a>
                                 <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/orders' ? 'block;' : 'none;' }}">
                                    <li><a href="#" class="#">Tools</a></li>
                                 </ul>
                              </li>
                              @if (auth()->user()->hasPermission('pages_read'))
                              <li class="sidebar-list">
                                 <label class="badge badge-danger"></label>
                                 <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/pages' ? 'active' : '' }}" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map">
                                       <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                                       <line x1="8" y1="2" x2="8" y2="18"></line>
                                       <line x1="16" y1="6" x2="16" y2="22"></line>
                                    </svg>
                                    <span>Pages</span>
                                    <div class="according-menu">
                                       <i class="fa fa-angle-{{request()->route()->getPrefix() == '/pages' ? 'down' : 'right' }}"></i>
                                    </div>
                                 </a>
                                 <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/orders' ? 'block;' : 'none;' }}">
                                    <li><a href="{{ route('admin.pages.index') }}" class="">All Pages</a></li>
                                    <li><a href="{{ route('admin.pages.create') }}" class="">Create Page</a></li>
                                 </ul>
                              </li>
                              @endif
                              @if (auth()->user()->hasPermission('blogs_read'))
                              <li class="sidebar-list">
                                 <label class="badge badge-danger"></label>
                                 <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/blogs' ? 'active' : '' }}" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-film">
                                       <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                                       <line x1="7" y1="2" x2="7" y2="22"></line>
                                       <line x1="17" y1="2" x2="17" y2="22"></line>
                                       <line x1="2" y1="12" x2="22" y2="12"></line>
                                       <line x1="2" y1="7" x2="7" y2="7"></line>
                                       <line x1="2" y1="17" x2="7" y2="17"></line>
                                       <line x1="17" y1="17" x2="22" y2="17"></line>
                                       <line x1="17" y1="7" x2="22" y2="7"></line>
                                    </svg>
                                    <span>Blogs</span>
                                    <div class="according-menu">
                                       <i class="fa fa-angle-{{request()->route()->getPrefix() == '/blogs' ? 'down' : 'right' }}"></i>
                                    </div>
                                 </a>
                                 <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/blogs' ? 'block;' : 'none;' }}">
                                    <li><a href="{{ route('admin.blogs.index') }}" class="#">All</a></li>
                                    <li><a href="{{ route('admin.blogs.create') }}" class="#">Create</a></li>
                                 </ul>
                              </li>
                              @endif
                              @if (auth()->user()->hasPermission('tags_read'))
                              <li class="sidebar-list">
                                 <label class="badge badge-danger"></label>
                                 <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/tags' ? 'active' : '' }}" href="#">
                                    <i class="nav-icon fa fa-hashtag"></i>
                                    <span>Tags</span>
                                    <div class="according-menu">
                                       <i class="fa fa-angle-{{request()->route()->getPrefix() == '/tags' ? 'down' : 'right' }}"></i>
                                    </div>
                                 </a>
                                 <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/blogs' ? 'block;' : 'none;' }}">
                                    <li><a href="{{ route('admin.tags.index') }}" class="#">All Tags</a></li>
                                    <li><a href="{{ route('admin.tags.create') }}" class="#">Create Tags</a></li>
                                 </ul>
                              </li>
                              @endif


                              @if (auth()->user()->hasPermission('site_settings_read'))
                              <li class="sidebar-list mt-1">
                                 <label class="badge badge-danger"></label>
                                 <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/site_settings' ? 'active' : '' }}" href="#">
                                    <i class="fa fa-wrench nav-icon"></i>
                                    <span>Site Settings</span>
                                    <div class="according-menu">
                                       <i class="fa fa-angle-{{request()->route()->getPrefix() == '/site_settings' ? 'down' : 'right' }}"></i>
                                    </div>
                                 </a>
                                 <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/site_settings' ? 'block;' : 'none;' }}">
                                    <li><a href="{{route('admin.settings.site.show', 1)}}" class="{{ Route::currentRouteName()=='admin.settings.site.show' ? 'active' : '' }}">General</a></li>
                                    <li><a href="{{route('admin.settings.social.show')}}" class="{{ Route::currentRouteName()=='admin.settings.social.show' ? 'active' : '' }}">Social</a></li>
                                    <li><a href="{{route('admin.settings.database.show', 1)}}" class="{{ Route::currentRouteName()=='admin.settings.database.show' ? 'active' : '' }}">Database</a></li>
                                 </ul>
                              </li>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="simplebar-placeholder" style="width: auto; height: 2508px;"></div>
               </div>
               <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                  <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
               </div>
               <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                  <div class="simplebar-scrollbar" style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
               </div>
            </ul>
         </div>
         <div class="right-arrow" id="right-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
               <line x1="5" y1="12" x2="19" y2="12"></line>
               <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
         </div>
      </nav>
   </div>
</div>
