<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use MongoDB\Driver\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
	// Show all listings
    public function index() {
//		dd(Listing::latest()->filter(request(['tag', 'search']))->paginate('6') );
	    return view('listings.index', [
		    'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate('6')
	    ]);
    }

	// Show single listing
	public function show(Listing $listing) {
		return view('listings.show', [
			'listing' => $listing
		]);
	}

	//Show Create Form
	public function create() {
		return view('listings.create');
	}


	//Store listing data
	public function store(Request $request) {
//		dd($request->file('logo')->store());
		$formFields = $request->validate([
			'animal' => 'required',
			'animalName' => ['required', Rule::unique('listings', 'animalName')],
			'location' => 'required',
			'email' => ['required', 'email'],
			'tags' => 'required',
			'description' => 'required'
		]);

		if($request->hasFile('logo')) {
			$formFields['logo'] = $request->file('logo')->store('logos', 'public');
		}

		$formFields['user_id'] = auth()->id();

		Listing::create($formFields);

		return redirect('/')->with('message', 'Post created successufully!');

	}


	// Show Edit form
	public function edit(Listing $listing) {
		return view('listings.edit', ['listing' => $listing]);
	}


	public function update(Request $request, Listing $listing) {

		// Make Sure Logged In User Is Owner
		if($listing->user_id != auth()->id()) {
			abort(403, 'Unauthorized Action');
		}
		$formFields = $request->validate([
			'animal' => 'required',
			'animalName' => 'required',
			'location' => 'required',
			'email' => ['required', 'email'],
			'tags' => 'required',
			'description' => 'required'
		]);

		if($request->hasFile('logo')) {
			$formFields['logo'] = $request->file('logo')->store('logos', 'public');
		}

		$listing->update($formFields);

		return back()->with('message', 'Post updated successufully!');

	}


	// Delete Listing
	public function destroy(Listing $listing) {
		// Make Sure Logged In User Is Owner
		if($listing->user_id != auth()->id()) {
			abort(403, 'Unauthorized Action');
		}
		$listing->delete();
		return redirect('/')->with('message', 'Listing deleted successufully!');
	}


	// Manage Listings
	public function manage() {
		return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
	}
}
