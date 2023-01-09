<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $countries = Country::all();

        if ($request->has('search')){
            $countries=Country::where('name','like',"%{$request->get('search')}%")
                ->orWhere('country_code','like',"%{$request->get('search')}%")->get();
        }

        return view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return RedirectResponse
     */
    public function store(CountryRequest $request): RedirectResponse
    {
        Country::create([
            'name' => $request->get('name'),
            'country_code' => $request->get('country_code')
        ]);

        return to_route('countries.index')->with('success', 'Country Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Country $country
     * @return Application|Factory|View
     */
    public function edit(Country $country): Application|Factory|View
    {
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param Country $country
     * @return RedirectResponse
     */
    public function update(CountryRequest $request, Country $country): RedirectResponse
    {

        $country->update([
            'name'=>$request->get('name'),
            'country_code'=>$request->get('country_code'),
        ]);
        return to_route('countries.index')->with('success', 'Country updates successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Country $country
     * @return RedirectResponse
     */
    public function destroy(Country $country): RedirectResponse
    {
        $country->delete();
        return to_route('countries.index')->with('danger', 'Country deleted successfully');

    }
}
