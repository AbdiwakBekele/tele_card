<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">

            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="/">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>


            <!-- Stock & Sales -->
            <div class="sb-sidenav-menu-heading">Stock & Sales</div>
            <!-- Stock Management -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStock"
                aria-expanded="false" aria-controls="collapseStock">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Stock
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseStock" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="inventory_dashboard">Stock Dashboard</a>
                    <a class="nav-link" href="#">E-Pin Import</a>
                    <a class="nav-link" href="#">E-Pin Query</a>
                    <a class="nav-link" href="#">Stock Movement</a>
                    <a class="nav-link" href="#">Stock Record</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSales"
                aria-expanded="false" aria-controls="collapseSales">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Sales
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>

            <div class="collapse" id="collapseSales" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="#">Sales Dashboard</a>
                    <a class="nav-link" href="#">Agent Sales</a>
                    <a class="nav-link" href="#">Top Agent Sales</a>
                </nav>
            </div>











            <!-- User Management -->
            <div class="sb-sidenav-menu-heading">User $ Orders</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers"
                aria-expanded="false" aria-controls="collapseUsers">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Users
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>

            <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="#">Agents</a>
                    <a class="nav-link" href="#">Sub Agents</a>
                    <a class="nav-link" href="#">Balance Management</a>
                    <a class="nav-link" href="#">Adjustment History</a>
                    <a class="nav-link" href="#">Reset Password</a>
                </nav>
            </div>

            <!-- Order Management -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrders"
                aria-expanded="false" aria-controls="collapseOrders">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Orders
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>

            <div class="collapse" id="collapseOrders" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="#">Agents Order</a>
                    <a class="nav-link" href="#">Sub-Agents Order</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Admin
    </div>
</nav>