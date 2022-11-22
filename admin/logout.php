<?php

session_start();

if (isset($_SESSION['login'])) {
    unset($_SESSION);

    session_destroy();

//
    die("Silahkan login <a href='uas---aplikasi-presensi-Melati2002/index.php'>di sini</a>");
}