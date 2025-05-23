<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Application::latest()->paginate(5);

        return view('applications.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'application_description' =>  'required',
            'application_date' =>  'required',
            'student_id' =>  'required'
        ]);

        $application = new Application();

        $application->application_description = $request->application_description;
        $application->application_date = $request->application_date;
        $application->student_id = $request->student_id;

        $application->save();

        return redirect()->route('applications.index')->with('success', 'Application Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        Log::info($application);
        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        Log::info($application);
        return view('applications.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        $request->validate([
            'application_description' =>  'required',
            'application_date' =>  'required',
            'student_id' =>  'required'
        ]);

        Log::info($application);

        $application = Application::find($request->hidden_id);

        $application->application_description = $request->application_description;

        $application->application_date = $request->application_date;

        $application->student_id = $request->student_id;

        $application->save();

        return redirect()->route('applications.index')->with('success', 'application Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'application Data deleted successfully');
    }
}
