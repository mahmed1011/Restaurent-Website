    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class=" bg-secondary navbar-dark nav navbar menu">
            <a href="{{ route('admin.dashboard') }}" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin</h3>
            </a>
            <div class="navbar-nav w-100">
                <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link active"><i
                        class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                <a href="{{ route('users') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Users</a>
                <a href="{{ route('show.about') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>About us</a>
                <a href="{{ route('show.foods') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Food</a>
                <a href="{{ route('show.chefs') }}" class="nav-item nav-link"><i
                        class="fa fa-keyboard me-2"></i>Chefs</a>
                <a href="{{ route('show.reservation') }}" class="nav-item nav-link"><i
                        class="fa fa-keyboard me-2"></i>Reservation</a>
                <div class="nav-item dropdown">
                    <a href="/table1" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fa fa-table me-2"></i>Special Meal</a>
                    <div class="dropdown-menu bg-transparent border-0 sb-sidenav-collapse-arrow">
                        <a href="{{ route('show.breakfast') }}" class="dropdown-item">Breakfast</a>
                        <a href="{{ route('show.lunch') }}" class="dropdown-item">Lunch</a>
                        <a href="{{ route('show.dinner') }}" class="dropdown-item">Dinner</a>
                    </div>
                </div>
                <a href="{{ route('show.orders') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Orders</a>
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->
