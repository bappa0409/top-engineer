<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $totalProjects = \App\Models\Project::count();
        $publishedProjects = \App\Models\Project::where('status', 'published')->count();
        $draftProjects = \App\Models\Project::where('status', 'draft')->count();
        $totalContacts = \App\Models\Contact::count();
        $recentProjects = \App\Models\Project::latest()->take(5)->get();
        $recentContacts = \App\Models\Contact::latest()->take(5)->get();

        $today = now()->toDateString();

        $totalVisitors = Visitor::distinct('ip')->count('ip');
        $todayVisitors = Visitor::where('visit_date', $today)->distinct('ip')->count('ip');

        $todayVisitorList = Visitor::where('visit_date', $today)
            ->orderByDesc('visits')
            ->get();

        return view('pages.dashboard', compact(
            'totalProjects',
            'publishedProjects',
            'draftProjects',
            'totalContacts',
            'recentProjects',
            'recentContacts',
            'totalVisitors',
            'todayVisitors',
            'todayVisitorList'
        ));
    }

}
