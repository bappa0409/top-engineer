<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('status', 'published')->latest()->get();
        return view('frontend.pages.home', compact('projects'));
    }
}
