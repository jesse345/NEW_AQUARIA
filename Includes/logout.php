<?php
include("../Model/db.php");
session_start();
if (isset($_SESSION['id'])) {
    editUser(
        'users',
        array(
            'id',
            'isLoggedIn'
        ),
        array($_SESSION['id'], 'No')
    );
    session_destroy();
    header("Location: ../");
} else {
    header("Location: /");
}