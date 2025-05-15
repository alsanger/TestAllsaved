<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Controller for rendering basic pages
 */
class PageController extends Controller
{
    /**
     * Display the dashboard page
     *
     * @return View
     */
    public function dashboard(): View
    {
        // Відображення головної сторінки дашборду
        return view('pages.dashboard');
    }

    /**
     * Display the profile page
     *
     * @return View
     */
    public function profile(): View
    {
        // Відображення сторінки профілю користувача
        return view('pages.profile');
    }

    /**
     * Display the settings page
     *
     * @return View
     */
    public function settings(): View
    {
        // Відображення сторінки налаштувань
        return view('pages.settings');
    }
}
