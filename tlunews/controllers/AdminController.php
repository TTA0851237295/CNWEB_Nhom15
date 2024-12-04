<?php
require_once '../tlunews/models/User.php';

class AdminController {
    public function login() {
        include "../views/admin/login.php";
    }

    public function dashboard() {
        include "../views/admin/dashboard.php";
    }

    public function manageNews()
    {
        include '../tlunews/views/admin/new/index.php';
    }

}
