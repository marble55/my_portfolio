<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutList;
use App\Models\Contact;
use App\Models\ContactLink;
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
        $contacts = Contact::first();
        $contactLinks = ContactLink::get();
        
        return view('portfolio.index', compact(
            'heroSections', 
            'abouts', 
            'skillLists', 
            'experienceLists', 
            'educationLists',
            'services',
            'portfolios',
            'contacts',
            'contactLinks',
        ));
    }

}
