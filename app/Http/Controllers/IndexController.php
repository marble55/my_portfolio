<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutList;
use App\Models\Contact;
use App\Models\ContactLink;
use App\Models\HeroSection;
use App\Models\Portfolio;
use App\Models\Service;

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
        $services = Service::all();
        $portfolios = Portfolio::get();
        $contacts = Contact::first();
        $social_contact = ContactLink::first();
        $socialLinks = ContactLink::where('id', '>', 2)->get();

        $aboutFact1 = AboutList::find(1);
        $aboutFact2 = AboutList::find(2);
        $aboutFact3 = AboutList::find(3);

        $attachment = $heroSections->attachment()->first();

        $cv_document = $attachment->url();

      
        return view('portfolio.index', compact(
            'heroSections', 
            'abouts', 
            'skillLists', 
            'experienceLists', 
            'educationLists',
            'services',
            'portfolios',
            'contacts',
            'socialLinks',
            'cv_document',
            'social_contact',
            'aboutFact1',
            'aboutFact2',
            'aboutFact3',
        ));
    }

}
