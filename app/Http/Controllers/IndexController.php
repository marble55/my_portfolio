<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutList;
use App\Models\HeroSection;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $heroSections = HeroSection::first();
        $abouts = About::first();
        $skillLists = AboutList::where('category', '=', 'Skill')->get();
        $experienceLists = AboutList::where('category', '=', 'Experience')->get();
        $educationLists = AboutList::where('category', '=', 'Education')->get();
        $services = Service::get();
        $portfolios = Portfolio::get();
        return view('portfolio.index', compact(
            'heroSections', 
            'abouts', 
            'skillLists', 
            'experienceLists', 
            'educationLists',
            'services',
            'portfolios'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
