<?php

/**
 * Functions to help with website operations
 */

/**
 * Generate the page title with proper formatting
 *
 * @param string $title The page-specific title
 * @param string $site_name The name of the site (optional)
 * @return string The formatted page title
 */
function getPageTitle($title, $site_name = "Kyle Anderson Portfolio")
{
    if ($title === $site_name) {
        return $site_name;
    }
    return "$title | $site_name";
}

/**
 * Generate class attributes for active navigation items
 *
 * @param string $page The page name to check
 * @return string The class attribute if current page, empty string otherwise
 */
function activeClass($page)
{
    global $current_page;
    return ($current_page === $page) ? ' class="active"' : '';
}

/**
 * Format date in a consistent manner
 *
 * @param string $date_string Date string
 * @return string Formatted date
 * @throws DateMalformedStringException
 */
function formatDate($date_string)
{
    $date = new DateTime($date_string);
    return $date->format('Y - Present');
}

/**
 * Create section header with title and optional subtitle
 *
 * @param string $title The section title
 * @param string $subtitle Optional subtitle
 * @return string The formatted HTML
 */
function createSectionHeader($title, $subtitle = "")
{
    $html = '<header>';
    $html .= "<h1>$title</h1>";

    if (!empty($subtitle)) {
        $html .= "<p class=\"subtitle\">$subtitle</p>";
    }

    $html .= '</header>';

    return $html;
}

/**
 * Load project data from JSON file
 * Useful if you want to store projects in JSON instead of PHP arrays
 *
 * @param string $file_path Path to the JSON file
 * @return array Project data
 */
function loadProjectsFromJson($file_path)
{
    if (file_exists($file_path)) {
        $json_data = file_get_contents($file_path);
        return json_decode($json_data, true);
    }
    return [];
}
