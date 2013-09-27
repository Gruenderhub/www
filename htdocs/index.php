<?php

$home = ''; // Name der Startseite
$pages = array($home, 'impressum', 'ansprechpartner'); // Erlaubte Seitennamen

// Findet den Seitennamen
$page = function ($name) use ($home, $pages) {
    $thePage = array_filter($pages, function ($pageName) use ($name) {
        return $pageName === $name;
    });
    return count($thePage) == 0 ? $home : array_shift($thePage);
};

$requestPageName = "" . substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1);
$currentPageName = $page($requestPageName);
if ($currentPageName !== $requestPageName) {
    header("HTTP/1.0 404 Not Found", true, 404);
    return;
}

require_once 'parts/header.php';
require_once 'pages/' . ($currentPageName == $home ? 'index' : $currentPageName) . '.php';
require_once 'parts/footer.php';
