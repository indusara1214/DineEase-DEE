<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/common.css">
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>/public/img/login/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/receptionist-styles.css">
    <title><?php echo SITENAME; ?></title>
    <style>
        .dashboard-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 97.6%;
            padding: 20px;
            height: 60px;
        }

        .receptionist-dashboard-container {
            display: flex;
            flex-direction: column;
            padding: 5px;
        }

        .rdh-item {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 30%;
            height: 100%;
        }

        .rdh-date-picekr {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .rdh-date-picekr span {
            cursor: pointer;
        }

        .rdh-date-picekr input {
            padding: 5px;
            border: none;
            border-radius: 5px;
            outline: none;
            font-size: x-large;
        }

        .dashboard-content {
            display: flex;
            flex-direction: column;
            height: 100vh;
            padding: 25px;
        }

        .receptionist-dashboard-container table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
            border: var(--brandgreen) solid 4px;
            border-radius: 10px;
        }

        .receptionist-dashboard-container table tr {
            height: 50px;
        }

        .receptionist-dashboard-container table tr td {
            border: var(--brandgreen) solid 1px;
            text-align: center;
        }

        .receptionist-dashboard-container table tr td:nth-child(1) {
            width: 10% !important;
        }


        .view-slot-button {
            background-color: var(--brandgreen);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .view-slot-button:hover {
            background-color: var(--brandgreen-dark);
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

                            <span class="material-symbols-outlined material-symbols-outlined-topbar  topbar-notifications">notifications </span>
                            Hello, &nbsp; <?php echo ucfirst($_SESSION['role']) ?> <span class="user-name"> &nbsp; | &nbsp; <?php echo  $_SESSION['user_name'] ?></span>
                            <img src="<?php echo URLROOT ?>/img/profilePhotos/<?php echo $_SESSION['profile_picture'] ?>" alt="profile-photo" class="profile" />
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
                                    <button class="button-sidebar-menu active-nav">
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
                                <a href="<?php echo URLROOT ?>/receptionists/menu" class="nav_link" onclick="changeContent('menu')">
                                    <button class="button-sidebar-menu">
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
            <div class="receptionist-dashboard-container">

                <?php
                if (isset($data['input']['date'])) {
                    $selectedDate = $data['input']['date'];
                } else {
                    $selectedDate = date('Y-m-d');
                }
                ?>

                <?php
                if (isset($data['suite'])) {
                    $selectedSuite = $data['suite'];
                } else {
                    $selectedSuite = 1;
                }
                ?>

                <div class="dashboard-head">
                    <div class="rdh-item">
                        <div class="buttonset-container">
                            <button class="buttonset-button" onclick="changeSuiteFilter(this);" data-package-id="0">All</button>
                            <?php
                            foreach ($data['packages'] as $package) {
                                echo '<button class="buttonset-button" onclick="changeSuiteFilter(this);" data-package-id="' . $package->packageID . '">' . $package->packageName . '</button>';
                            }
                            ?>
                            <form id="suiteAndDateFilterForm" action="Index" method="post">
                                <input type="number" id="suiteFilter" name="suite" value="<?php echo $selectedSuite ?>" hidden />

                        </div>
                    </div>
                    <div class="rdh-item">
                        <div class="rdh-date-picekr buttonset-container">

                            <span onclick="changeDate(-1)"><i class="fa-solid fa-caret-left"></i></span>
                            <input type="date" name="date" id="date-picker" value="<?php echo $selectedDate; ?>" />
                            <span onclick="changeDate(1)"><i class="fa-solid fa-caret-right"></i></span>
                            </form>
                        </div>
                    </div>
                    <div class="rdh-item"></div>
                </div>
                <div class="dashboard-content">

                    <table class="table-fixed">
                        <?php
                        // Example PHP logic to demonstrate dynamic content
                        for ($time = $data['reservationsStartTime']; $time < $data['reservationsEndTime']; $time++) {
                        ?>
                            <tr>
                                <td><?= $time ?></td>
                                <?php
                                if ($data['reservations']) {
                                    foreach ($data['reservations'] as $reservation) {
                                        $slot = date("G", strtotime($reservation->reservationStartTime));

                                        if ($slot == $time) {
                                            echo '<td><button class="view-slot-button" data-reservation-id="' . $reservation->reservationID . '" onclick="slotPopup();" name="slot-button">' . $reservation->reservationID . '</button></td>';
                                        }
                                    }
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URLROOT; ?>/js/jquery-3.7.1.js"></script>
    <script src="<?php echo URLROOT; ?>/js/customer.js"></script>
    <script src="<?php echo URLROOT; ?>/js/receptionist.js"></script>
</body>

</html>