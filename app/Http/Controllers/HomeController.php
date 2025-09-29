<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('admin.index');
    }

    public function welcome()
    {
        $skills = \App\Models\Skill::all();
        $educations = \App\Models\Education::all();
        $experiences = \App\Models\Experience::all();
        $projects = \App\Models\Project::with('files')->get()->map(function ($project) {
            // Pastikan tech_stack adalah array
            $techStackIds = is_string($project->tech_stack) ? json_decode($project->tech_stack, true) : $project->tech_stack;
            $techStackIds = is_array($techStackIds) ? $techStackIds : [];
            
            $project->tech_stack_skills = \App\Models\Skill::whereIn('id', $techStackIds)->get();
            return $project;
        });

        return view('welcome', compact('skills', 'educations', 'experiences', 'projects'));
    }

    public function show($id)
    {
        $project = \App\Models\Project::with('files')->findOrFail($id);
        
        // Pastikan tech_stack adalah array
        $techStackIds = is_string($project->tech_stack) ? json_decode($project->tech_stack, true) : $project->tech_stack;
        $techStackIds = is_array($techStackIds) ? $techStackIds : [];
        
        $project->tech_stack_skills = \App\Models\Skill::whereIn('id', $techStackIds)->get();
        
        return view('detail', compact('project'));
    }
    public function sendContact(Request $request)
{
    $request->validate([
        'name' => 'required|max:100',
        'email' => 'required|email',
        'message' => 'required|max:1000',
    ]);

    Mail::raw(
        "Name: {$request->name}\nEmail: {$request->email}\n\nMessage:\n{$request->message}",
        function ($mail) use ($request) {
            $mail->to('iqbalhmbl505@gmail.com')
                 ->subject('Portfolio Contact Form');
        }
    );

    return response()->json(['success' => true, 'message' => 'Message sent successfully!']);
}
}
