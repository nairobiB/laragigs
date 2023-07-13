<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(10) //sorted all filtered, paginate is used to list certain amount of items per page
        ]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            // Loading the view listings[the folder].show[file in the folder]
            //check Common resource routes in web.php
            'listing' => $listing
        ]);
    }
    // Show create form
    public function create()
    {
        return view('listings.create');
    }

    //Store listing data
    public function store(Request $request)
    {
        //dd($request->all()); //shows all the data that were inputted
        //we can validate fields, to see all, check documentation
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            //more than a rule uses an array, in ('listings', 'company') we are naming the table and the field we want unique
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            //the email means it has to be in that format
            'tags' => 'required',
            'description' => 'required'
        ]); //if any of these fail once the form is submitted it will send an error to the view
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');

        }
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }
    //Show Edit Form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    //Update listing data
    public function update(Request $request, Listing $listing)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($formFields);
        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted succesfully');
    }
}