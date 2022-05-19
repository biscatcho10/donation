<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return RedirectResponse
     */
    public function index()
    {
        return redirect()->route('dashboard.home');
    }
}
