<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::latest()
                    ->filter($filters)
                    ->paginate(16)
                    ->withQueryString()
            ]
        );
    }

    public function create()
    {
        return inertia('Listing/Create', [
            'countries' => Country::all()->toArray()
        ]);
    }

    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate([
            'beds' => 'required|integer|min:0|max:20',
            'baths' => 'required|integer|min:0|max:20',
            'area' => 'required|integer|min:15|max:1500',
            'city' => 'required',
            'code' => 'required',
            'country_id' => 'required|exists:countries,id',
            'street' => 'required',
            'street_nr' => 'required|min:1|max:1000',
            'price' => 'required|integer|min:1|max:20000000',
        ]));

        return redirect()->route('listing.index')
            ->with('success', 'Listing was created!');
    }

    public function show(Listing $listing)
    {
        return inertia('Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing,
                'countries' => Country::all()->toArray()
            ]
        );
    }

    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('listing.index')
            ->with('success', 'Listing was changed!');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}
