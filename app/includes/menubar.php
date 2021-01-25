<header id="header_cart">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- <div class="container"> -->
        <a href="/" class="navbar-brand">
            <h5 class="px-4">
                <i class="fas fa-home"></i> Home
            </h5>
        </a>
        <a href="/services" class="navbar-brand">
            <h5 class="px-4">
                <i class="fas fa-address-card"></i> Services
            </h5>
        </a>
        <a href="/contact" class="navbar-brand">
            <h5 class="px-4">
                <i class="fas fa-people-carry"></i> Contact Us
            </h5>
        </a>
        <a href="/products" class="navbar-brand">
            <h5 class="px-4">
                <i class="fas fa-shopping-basket"></i> Product
            </h5>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="/cart" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (Cart::count() > 0) {
                            echo "<span style=\"text-align: center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius: 3rem; \"id=\"cart_count\" class=\"text-warning bg-light\">" . Cart::count() . "</span>";
                        } else {
                            echo "<span style=\"text-align: center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius: 3rem; id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }
                        ?>
                    </h5>
                </a>
            </div>
        </div>
    <!-- </div> -->
    </nav>
</header>
