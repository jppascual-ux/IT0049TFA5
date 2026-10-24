<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Handles the two static pages of SariPOS: the landing page and the about page.
 */
class PageController extends Controller
{
    /**
     * GET /  -> landing page.
     */
    public function home(): View
    {
        return view('pages.home', [
            'title' => 'Home',
        ]);
    }

    /**
     * GET /about  -> about page.
     */
    public function about(): View
    {
        return view('pages.about', [
            'title' => 'About',
        ]);
    }
}
