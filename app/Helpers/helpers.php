<?php

use Illuminate\Support\Facades\Route;

function pageTitle($prefix = 'SIWAGE', $onlyTitle = false)
{
    $routeName = Route::currentRouteName() ?? '';

    $cleanRoute = str_replace(['.index', '.show'], '', $routeName);

    $cleaned = str_replace(['.', '_'], ' ', $cleanRoute);
    $title = ucwords($cleaned);

    if ($onlyTitle) {
        return $title ?: 'Dashboard';
    }

    return $title ? ($prefix . ' | ' . $title) : $prefix;
}
