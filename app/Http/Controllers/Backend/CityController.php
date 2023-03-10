<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\State;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $cities=City::all();

        if ($request->has('search')){
            $cities=City::where('name','like',"%{$request->get('search')}%")->get();
        }

        return view('cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $states=State::all();
        return view('cities.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CityRequest $request
     * @return RedirectResponse
     */
    public function store(CityRequest $request): RedirectResponse
    {
        City::create([
            'name'=>$request->get('name'),
            'state_id'=>$request->get('state_id'),
        ]);
        return to_route('cities.index')->with('success','City added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return Application|Factory|View
     */
    public function edit(City $city): View|Factory|Application
    {
        $states=State::all();
        return  view('cities.edit',compact('city','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CityRequest $request
     * @param City $city
     * @return RedirectResponse
     */
    public function update(CityRequest $request, City $city): RedirectResponse
    {
        $city->update([
            'name'=>$request->get('name'),
            'state_id'=>$request->get('state_id'),
        ]);
        return to_route('cities.index')->with('success','City updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return RedirectResponse
     */
    public function destroy(City $city): RedirectResponse
    {
        $city->delete();
        return to_route('cities.index')->with('danger','City Deleted Successfully');
    }
}
