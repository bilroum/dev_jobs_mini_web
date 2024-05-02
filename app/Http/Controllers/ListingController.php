<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //
    public function index()
    {
        //Mail::to('bilroum@gmail.com')->send(new WelcomeMail());

        // dd(request());
        // dd(Listing::latest()->filter(request(['tag', 'keywords', 'location']))->paginate(3),);
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'keywords', 'location']))->paginate(3),
        ]);
    }

    public function listings()
    {
        return view('listings.listings', ['listings' => Listing::paginate(15)]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    //show create form
    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $formfields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'salary' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formfields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formfields['user_id'] = auth()->id();

        Listing::create($formfields);

        return redirect('/')->with('success', 'Listing created!');
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $formfields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'email' => ['required', 'email'],
            'salary' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formfields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formfields);

        return redirect('/')->with('success', 'Listing Updated!');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect('/')->with('success', 'Listing ' . $listing->title . ' deleted.');
    }

    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
