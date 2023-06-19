<?php

namespace App\Http\Controllers;

use App\Models\Tips;
use Illuminate\Http\Request;

class TipsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tips.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tips.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tips::create($this->validateTips($request));

        return redirect(route('tips.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tips $tips)
    {
        return view('tips.show', ['tips' => $tips]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tips $tips)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tips $tips)
    {
        //
    }

    public function validateTips(Request $request): array
    {
        return $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|regex:/^[0-9\s()-]+$/',
            'idea' => 'required|string',
        ], [
            'first_name.required' => 'Please enter your first name.',
            'last_name.required' => 'Please enter your last name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'telephone.required' => 'Please enter your telephone number.',
            'telephone.regex' => 'Please enter a valid telephone number.',
            'idea.required' => 'Please enter your idea.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tips $tips)
    {
        //
    }
}
