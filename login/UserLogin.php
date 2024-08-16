<?php
session_start();
include "../model/UserDAO.php";
include "../model/DTRDAO.php";

$username = $_POST["username"];
$password = $_POST["password"];
$role = $_POST["role"];

$process = new UserDAO();
$dtr = new DTRDAO();

$getResult = $process->personnel($username, $password);
foreach ($getResult as $row) {
    if ($row == 'Empty') {
        session_destroy();
        header("Location: ../?Invalid= 1");
    } else {
        $_SESSION["userid"] = $row['userid'];
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        if ($role == $row['role']) {
            $_SESSION["empid"] = $row['empid'];
            $_SESSION["fname"] = $row['fname'];
            $_SESSION["mname"] = $row['mname'];
            $_SESSION["lname"] = $row['lname'];
            $_SESSION['role'] = $role;
            $dtr->timeIn($row['empid']);
            if ($row['role'] == 'Cashier') {
                header("Location: ../pos/");
            } else if ($row['role'] == 'Manager') {
                header("Location: ../manage/");
            } else if ($row['role'] == 'Personnel') {
                header("Location: ../inventory/");
            } else {
                header("Location: ../?Invalid= 2");
            }
        } else {
            session_destroy();
            header("Location: ../?Invalid= 2");
        }
    }
}