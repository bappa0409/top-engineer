<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;
use PSpell\Config;

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

    public function steelDetailing()
    {
        $projects = Project::where('status', 'published')->latest()->get();
        return view('frontend.pages.steel-detailing', compact('projects'));
    }
    public function rebarDetailing()
    {
        return view('frontend.pages.rebar-detailing');
    }
    public function ourProject()
    {
        $projects = Project::where('status', 'published')->latest()->get();
        return view('frontend.pages.our-project', compact('projects'));
    }
    public function consulting()
    {
        $projects = Project::where('status', 'published')->latest()->get();
        return view('frontend.pages.consulting', compact('projects'));
    }
    public function contact()
    {
        $projects = Project::where('status', 'published')->latest()->get();
        return view('frontend.pages.contact', compact('projects'));
    }
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'mobile'  => 'nullable|regex:/^[0-9+\-\s]{7,20}$/',
            'message' => 'required|string|min:10',
        ],
        [
            'mobile.regex' => 'Please enter a valid mobile number.',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->message = $request->message;
        $contact->save();


        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully'
        ]);
    }
}
