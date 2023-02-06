<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
	// Show all listings
    public function index() {
		dd( request() );
	    return view('listings.index', [
		    'listings' => Listing::all()
	    ]);
    }

	// Show single listing
	public function show(Listing $listing) {
		return view('listings.show', [
			'listing' => $listing
		]);
	}
}