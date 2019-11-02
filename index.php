<?php
session_start();
require('controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'home') {
        home();
    }
    elseif ($_GET['action'] == 'simulateDelivery') {
            simulateDelivery();
    }
    elseif ($_GET['action'] == 'addDelivery') {
            addDelivery();
            home();
    }
    elseif ($_GET['action'] == 'addUser') {
            addUser();
            home();
    }
    elseif ($_GET['action'] == 'login') {
            login();
            home();
    }
    elseif ($_GET['action'] == 'logout') {
            logout();
            home();
    }
    elseif ($_GET['action'] == 'findDelivery') {
            findDelivery();
    }
    elseif ($_GET['action'] == 'findSkipper') {
            findSkipper();
    }
}
else {
    home();
}