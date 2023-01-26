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

    public function show(Listing $listing)
    {
        return inertia('Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }


}
