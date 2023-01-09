<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request): View|Factory|Application
    {
        $states=State::all();

        if ($request->has('search')) {
            $states = State::where('name', 'like', "%{$request->get('search')}%")->get();
        }
        return view('states.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $countries=Country::all();
        return view('states.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StateRequest $request
     * @return RedirectResponse
     */
    public function store(StateRequest $request): RedirectResponse
    {
        State::create([
            'name'=>$request->get('name'),
            'country_id'=>$request->get('country_id'),
        ]);
        return to_route('states.index')->with('success','State Created Successfully');

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
     * @param State $state
     * @return Application|Factory|View
     */
    public function edit(State $state): View|Factory|Application
    {
        $countries=Country::all();
        return view('states.edit',compact('state','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StateRequest $request
     * @return RedirectResponse
     */
    public function update(StateRequest $request,State $state): RedirectResponse
    {
        $state->update([
            'name'=>$request->get('name'),
            'country_id'=>$request->get('country_id'),
        ]);
        return to_route('states.index')->with('success','State Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param State $state
     * @return RedirectResponse
     */
    public function destroy(State $state): RedirectResponse
    {
        $state->delete();
        return to_route('states.index')->with('danger','State deleted Successfully');

    }
}
