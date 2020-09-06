<ul class="navbar-nav theme-black sidebar accordion" id="accordionSidebar">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dasboard')}}">
		<div class="sidebar-brand-icon">
			<i class="fas fa-registered"></i>
		</div>
		<div class="sidebar-brand-text mx-2"><img class="img-fluid" src="{{asset('assets/img/logo.png')}}"></div>
	</a>
	<li class="nav-item {{ 
		Route::currentRouteName()=='dasboard' ? 'active' : '' 
	}}">
		<a class="nav-link" href="{{route('dasboard')}}">
		<i class="fas fa-fw fa-home"></i>
		<span>Dashboard</span></a>
    </li>
	<li class="nav-item {{ 
		Route::currentRouteName()=='suppliers' ||
		Route::currentRouteName()=='add' ||
		Route::currentRouteName()=='edit' ? 'active' : ''
	}}">
		<a class="nav-link {{ 
			Route::currentRouteName()=='suppliers' ||
			Route::currentRouteName()=='add' ||
			Route::currentRouteName()=='edit' ? '' : 'collapsed'
		}}" href="javascript:;" data-toggle="collapse" data-target="#supplier">
		<i class="fas fa-fw fa-users"></i>
		<span>Supplier</span>
		</a>
		<div id="supplier" class="collapse {{ 
			Route::currentRouteName()=='suppliers' ||
			Route::currentRouteName()=='add' ||
			Route::currentRouteName()=='edit' ? 'show' : ''
		}}" data-parent="#accordionSidebar">
			<div class="sub-menu py-2 collapse-inner">
				<a class="collapse-item {{ Route::currentRouteName()=='suppliers' ? 'active' : '' }}" href="{{route('suppliers')}}">All Suppliers</a>
				<a class="collapse-item {{ Route::currentRouteName()=='add' ? 'active' : '' }}" href="{{route('add')}}">Add New</a>
			</div>
		</div>
	</li>
	<li class="nav-item {{ 
		Route::currentRouteName()=='products' ||
		Route::currentRouteName()=='add_product' ||
		Route::currentRouteName()=='edit_product' ? 'active' : ''
	}}">
		<a class="nav-link {{ 
			Route::currentRouteName()=='products' ||
			Route::currentRouteName()=='add_product' ||
			Route::currentRouteName()=='edit_product' ? '' : 'collapsed'
		}}" href="#" data-toggle="collapse" data-target="#products" aria-expanded="true" aria-controls="products">
		<i class="fab fa-fw fa-product-hunt"></i>
		<span>Products</span>
		</a>
		<div id="products" class="collapse {{ 
			Route::currentRouteName()=='products' ||
			Route::currentRouteName()=='add_product' ||
			Route::currentRouteName()=='edit_product' ? 'show' : ''
		}}" data-parent="#accordionSidebar">
			<div class="sub-menu py-2 collapse-inner">
				<a class="collapse-item {{ Route::currentRouteName()=='products' ? 'active' : '' }}" href="{{route('products')}}">All Product</a>
				<a class="collapse-item {{ Route::currentRouteName()=='add_product' ? 'active' : '' }}" href="{{route('add_product')}}">Add New</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#purchases" aria-expanded="true" aria-controls="purchases">
		<i class="fas fa-fw fa-shopping-cart"></i>
		<span>Stock</span>
		</a>
		<div id="purchases" class="collapse" data-parent="#accordionSidebar">
			<div class="sub-menu py-2 collapse-inner">
				<a class="collapse-item" href="javascript:;">Stock In</a>
				<a class="collapse-item" href="javascript:;">Stock Out</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sales" aria-expanded="true" aria-controls="sales">
		<i class="fas fa-fw fa-dollar-sign"></i>
		<span>Sales</span>
		</a>
		<div id="sales" class="collapse" data-parent="#accordionSidebar">
			<div class="sub-menu py-2 collapse-inner">
				<a class="collapse-item" href="javascript:;">Sales</a>
				<a class="collapse-item" href="javascript:;">Sale History</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#roles_permissions" aria-expanded="true" aria-controls="roles_permissions">
		<i class="fas fa-fw fa-dollar-sign"></i>
		<span>Roles & Permissions</span>
		</a>
		<div id="roles_permissions" class="collapse" data-parent="#accordionSidebar">
			<div class="sub-menu py-2 collapse-inner">
				<a class="collapse-item" href="javascript:;">Roles</a>
				<a class="collapse-item" href="javascript:;">Permissions</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="javascript:;">
		<i class="fas fa-fw fa-chart-line"></i>
		<span>Reports</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="javascript:;">
		<i class="fas fa-fw fa-tools"></i>
		<span>Settings</span></a>
	</li>
</ul>