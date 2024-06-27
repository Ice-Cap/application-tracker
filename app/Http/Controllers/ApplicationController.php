<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('s', null);
        if ($search)
        {
            $applications = Application::where('company', 'LIKE', "%$search%")
                ->orWhere('title', 'LIKE', "%$search%")
                ->orderBy('id', 'desc')
                ->get();
        }
        else
        {
            $applications = Application::all()->sortByDesc('id')->all();
        }

        return view('applications', ['applications' => $applications]);
    }

    public function search(Request $request)
    {
        $search = $request->query('s', null);
        if ($search)
        {
            $applications = Application::where('company', 'LIKE', "$search%")
                ->orWhere('title', 'LIKE', "$search%")
                ->get();

            return $applications;
        }

        return [];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $application = Application::find($id);
        if (!$application)
        {
            return response('Application not found', 404);
        }

        return view('edit-application', ['application' => $application]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        if (!$input["title"] || !$input["company"])
        {
            return response('invalid input', 400);
        }

        $application = Application::find($id);
        if (!$application)
        {
            return response('not found', 404);
        }

        $application->company = $input["company"];
        $application->title = $input["title"];
        $application->site = $input["site"];
        $application->cover_letter = $input["cover_letter"] ?? false;
        $application->contacted = $input["contacted"] ?? false;
        $application->application_type = $input["application_type"];
        $application->response = $input["response"];
        $application->save();

        return redirect('/applications/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
