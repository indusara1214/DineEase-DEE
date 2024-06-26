
<nav class="sidebar">
    <div class="sidebar-container">
        <div class="menu_content">
            
            <ul class="menu_items">
                <div class="menu_title menu_menu"></div>
                <!-- <li class="item">
                    <a href="" class="nav_link">
                        <button class="button-sidebar-menu">
                            <span class="navlink_icon">
                                <span class="material-symbols-outlined ">
                                    home
                                </span>
                            </span>
                            <span class="button-sidebar-menu-content">Home </span>
                        </button>
                    </a>
                </li> -->
                <li class="item">
                    <a href="<?php echo URLROOT ?>./customers/index" class="nav_link" data-content='reservation'>
                        <button class="button-sidebar-menu" id="reservationButton"  >
                            <span class="navlink_icon">
                                <span class="material-symbols-outlined ">
                                    book_online
                                </span>
                            </span>
                            <span class="button-sidebar-menu-content">Reservation </span>
                        </button>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="nav_link nav_link_switch" data-content='menu'>
                        <button class="button-sidebar-menu" id="menusButton" >
                            <span class="navlink_icon">
                                <span class="material-symbols-outlined ">
                                    restaurant_menu
                                </span>
                            </span>
                            <span class="button-sidebar-menu-content">Menus </span>
                        </button>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="nav_link nav_link_switch"  data-content='review'>
                        <button class="button-sidebar-menu " id="reviewsButton">
                            <span class="navlink_icon">
                                <span class="material-symbols-outlined ">
                                    reviews
                                </span>
                            </span>
                            <span class="button-sidebar-menu-content">Reviews </span>
                        </button>
                    </a>
                </li>
                <!-- End -->


            </ul>
            <hr class='separator'>

            <ul class="menu_items">
                <div class="menu_title menu_user"></div>
                <li class="item">
                    <a href="#" class="nav_link nav_link_switch" data-content='profile'>
                        <button class="button-sidebar-menu">
                            <span class="navlink_icon">
                                <span class="material-symbols-outlined ">
                                    account_circle
                                </span>
                            </span>
                            <span class="button-sidebar-menu-content">My Account </span>
                        </button>
                    </a>
                </li>
                <li class="item">
                    <a href="<?php echo URLROOT; ?>/users/logout" class="nav_link">
                        <button class="button-sidebar-menu">
                            <span class="navlink_icon">
                                <span class="material-symbols-outlined ">
                                    logout
                                </span>
                            </span>
                            <span class="button-sidebar-menu-content">Logout</span>
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>