<?php

// URI

function extract_uri($full_uri) {
    $uri = str_replace(PUBLIC_DIR, '', $full_uri);
    $uri = str_replace('.php', '', $uri);
    return $uri;
}

function routeme($full_uri) {
    $uri = extract_uri($full_uri);

    return $routepath = __DIR__ . PATH_PREPEND_DIR . 'controllers/' . $uri . '.php';
}

// URL PARAMTERS

function extract_param($arg) {
    if (isset($_GET[$arg])) {
        return $_GET[$arg];
    } else {
        return 'ERROR: Unset Parameter.';
    }
}

// HEADERS
function set_title(string $page_title) {
    $site_name = 'Framework PHP';
    $full_title = htmlspecialchars($page_title) . ' | ' . $site_name; 
    return $full_title;
}

?>