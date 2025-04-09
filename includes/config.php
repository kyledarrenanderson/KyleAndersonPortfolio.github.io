<?php
// Site configuration
$site_name = "Kyle Anderson Portfolio";
$base_url = "/";

// Page titles
$page_titles = [
    "index" => "Kyle Anderson Portfolio",
    "aboutMe" => "About Me",
    "universityProjects" => "University Projects",
    "personalProjects" => "Personal Projects",
    "contactMe" => "Contact Me"
];

$current_page = basename($_SERVER['PHP_SELF'], '.php');

function isCurrentPage($page) {
    global $current_page;
    return $current_page === $page;
}
