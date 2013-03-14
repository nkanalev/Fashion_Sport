<?php
session_start();

    header('Cache-control: private'); // IE 6 FIX
    include_once 'mysql_init.class.php';
    $db = new mysql_init();
    $db -> mysql_init('root', '', 'fashion_sport', 'localhost');
    $db -> connect();

    if(isSet($_GET['lang']))
    {
        $lang = $_GET['lang'];
        $_SESSION['lang'] = $lang;
        setcookie('lang', $lang, time() + (3600 * 24 * 30));
    }
    else if(isSet($_SESSION['lang']))
    {
        $lang = $_SESSION['lang'];
    }
    else if(isSet($_COOKIE['lang']))
    {
        $lang = $_COOKIE['lang'];
    }
    else
    {
        $lang = 'en';
    }
    if(isSet($_GET['category']))
    {
        $category = $_GET['category'];
        $_SESSION['category'] = $category;
        setcookie('category', $category, time() + (3600 * 24 * 30));
    }
    else if(isSet($_SESSION['category']))
    {
        $category = $_SESSION['category'];
    }
    else if(isSet($_COOKIE['category']))
    {
        $category = $_COOKIE['category'];
    }
    else
    {
        $category = 1;
    }
    if(isSet($_GET['id']))
    {
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
        setcookie('id', $id, time() + (3600 * 24 * 30));
    }
    else if(isSet($_SESSION['id']))
    {
        $id = $_SESSION['id'];
    }
    else if(isSet($_COOKIE['id']))
    {
        $id = $_COOKIE['id'];
    }
    else
    {
        $id = 1;
    }
    switch ($lang) 
    {
        case 'en':  $lang_file = 'lang.en.php'; break;

        case 'fr':  $lang_file = 'lang.fr.php'; break;

        case 'bg':  $lang_file = 'lang.bg.php'; break;

        default:    $lang_file = 'lang.en.php';
    }

    ini_set('error_reporting', E_ALL & ~E_NOTICE& ~E_WARNING);
    include_once 'languages/'.$lang_file;
?>