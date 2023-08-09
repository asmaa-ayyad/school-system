<?php
function check_auth_with_role($role_name) {
    session_start();
    
    if (!isset($_SESSION["username"]) || $_SESSION["role"] !== $role_name) {
        header("Location: login.php");
        exit();
    }
}
?>