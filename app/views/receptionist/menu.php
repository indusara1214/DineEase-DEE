<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/customer-styles.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/common.css">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/public/img/login/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/receptionist-styles.css">
    <title><?php echo SITENAME; ?></title>

    <style>
        .view-only-menu .menu-container-div-out {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    gap: 15px;
    height: 50%;
    justify-content: center;
}
    </style>
</head>

<body>
    <div class="container">
        <div class="navbar-template">
            <nav class="navbar">
                <div class="topbar">
                    <div class="logo-item">
                        <i class="bx bx-menu" id="sidebarOpen"></i>
                        <img src="<?php echo URLROOT ?>/public/img/login/dineease-logo.svg" alt="DineEase Logo">
                        <div class="topbar-title">
                            DINE<span>EASE</span>
                        </div>
                    </div>
                    <div class="navbar-content">
                        <div class="profile-details">
                            <span class="material-symbols-outlined material-symbols-outlined-topbar ">notifications </span>
                            Hello, &nbsp; <?php echo ucfirst($_SESSION['role']) ?> <span class="user-name"> &nbsp; | &nbsp; <?php echo  $_SESSION['user_name'] ?></span>
                            <img src="<?php echo URLROOT ?>/public/img/login/profilepic.png" alt="profile-photo" class="profile" />
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="sidebar-template">
            <nav class="sidebar">
                <div class="sidebar-container">
                    <div class="menu_content">

                        <ul class="menu_items">
                            <div class="menu_title menu_menu"></div>
                            <li class="item">
                                <a href="<?php echo URLROOT ?>/receptionists/index" class="nav_link " onclick="changeContent('home')">
                                    <button class="button-sidebar-menu ">
                                        <span class="navlink_icon">
                                            <span class="material-symbols-outlined ">
                                                home
                                            </span>
                                        </span>
                                        <span class="button-sidebar-menu-content">Dashboard </span>
                                    </button>
                                </a>
                            </li>
                            <li class="item">
                                <a href="<?php echo URLROOT ?>/receptionists/reservation" class="nav_link" onclick="changeContent('reservation')">
                                    <button class="button-sidebar-menu">
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
                                <a href="<?php echo APPROOT ?>/receptionist/menu.php " class="nav_link" onclick="changeContent('menu')">
                                    <button class="button-sidebar-menu active-nav">
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
                                <a href="<?php echo URLROOT ?>/receptionists/refund" class="nav_link" onclick="changeContent('refund')">
                                    <button class="button-sidebar-menu">
                                        <span class="navlink_icon">
                                            <span class="material-symbols-outlined ">
                                                currency_exchange
                                            </span>
                                        </span>
                                        <span class="button-sidebar-menu-content">Refund </span>
                                    </button>
                                </a>
                            </li>
                           
                            <li class="item">
                                <a href="<?php echo URLROOT ?>/receptionists/orders" class="nav_link" onclick="changeContent('order')">
                                    <button class="button-sidebar-menu">
                                        <span class="navlink_icon">
                                            <span class="material-symbols-outlined ">
                                                list_alt
                                            </span>
                                        </span>
                                        <span class="button-sidebar-menu-content">Orders </span>
                                    </button>
                                </a>
                            </li>
                            <!-- End -->


                        </ul>
                        <hr class='separator'>

                        <ul class="menu_items">
                            <div class="menu_title menu_user"></div>
                            <li class="item">
                                <a href="<?php echo URLROOT ?>/receptionists/profile" class="nav_link">
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
        </div>
        <div class="body-template" id="content">
            <div class="body-template">
                <div class="view-only-menu">
                    <div class="customer-menu-view">
                        <div class="menu-view-header-bar">

                            <div class="menu-view-filters">
                                <div class="menu-categories">
                                    <button class="category-button active-category" data-category-id="all">All</button>
                                    <button class="category-button" data-category-id="1">Desserts & Drinks</button>
                                    <button class="category-button" data-category-id="2">Main Courses</button>
                                    <button class="category-button" data-category-id="3">Appetizers & Sides</button>
                                    <button class="category-button" data-category-id="4">Salads & Soups</button>
                                    <button class="category-button" data-category-id="5">Breakfast & Brunch</button>
                                    <button class="category-button" data-category-id="6">International Cuisine</button>
                                    <button class="category-button" data-category-id="7">Special</button>
                                </div>
                            </div>
                            <div class="menu-view-head">
                                <div class="search-reservation">
                                    <form class="search-form" method="GET" action="">
                                        <input type="text" name="search" placeholder="Search Menu Item" value="" id="search-input">
                                        <button type="submit" id="search-button">Search</button>
                                    </form>
                                </div>
                                <div class="menu-filters">
                                    <div class="price-filter">
                                        <!-- <div class="card-price-range">
                                    <div class="price-lab">
                                        <label>Min</label>
                                        <p id="min-value">$50</p>
                                    </div>

                                    <div class="range-slider">
                                        <div class="range-fill"></div>

                                        <input type="range" class="min-price" value="100" min="100" max="5000" step="10" />
                                        <input type="range" class="max-price" value="5000" min="100" max="5000" step="10" />
                                    </div>
                                    <div class="price-lab">
                                        <label>max</label>
                                        <p id="max-value">$500</p>
                                    </div>
                                </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="menu-box">
                                <div class="menu-items">
                                    <div id="menu-container" class="menu-container-div-out">
                                    </div>
                                </div>
                            </div>
                            <div class="view-pagination-container">
                                <div class="view-pagination">
                                    <button class="view-pagination-button " id="prev-page">Previous</button>
                                    <span class="view-pagination-text" id="page-info"></span>
                                    <button class="view-pagination-button" id="next-page">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        const URLROOT = "<?php echo URLROOT; ?>";
        var foodReviews = <?php echo json_encode($data['foodReview']); ?>;
        var menus = <?php echo json_encode($data['menus']); ?>;
        let itemsPerPage = 14;

    </script>  

    <script src="<?php echo URLROOT; ?>/js/jquery-3.7.1.js"></script>
    <script src="<?php echo URLROOT; ?>/js/menu.js"></script>
    <script src="<?php echo URLROOT; ?>/js/receptionist.js"></script>

</body>

</html>