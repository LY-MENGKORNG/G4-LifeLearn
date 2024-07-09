<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Systems\ListSystemResource;
use App\Models\Frontuser;
use App\Models\System;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:System access|System add|System edit|System delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:System add', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:System edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:System delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $principles  = Frontuser::role('principle')->get();
        $systems =  ListSystemResource::collection(System::list());
        foreach ($systems as $system) {
            $system['first_name'] = Frontuser::find($system->frontuser_id)->first_name;
            $system['last_name'] = Frontuser::find($system->frontuser_id)->last_name;
            $system['email'] = Frontuser::find($system->frontuser_id)->email;
            $system['phone'] = Frontuser::find($system->frontuser_id)->phone;
        }

        return view('system.index', ['systems' => $systems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('system.new');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|exists:frontusers,email',
            'location' => 'required|string',
        ]);
        $owner = Frontuser::where('email', $request->email)->firstOrFail();
        $request['frontuser_id'] = $owner->id;
        if (System::createOrUpdate($request)) {
            $owner->assignRole('principle');
        }
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit(System $system): View
    {
        $principle = Frontuser::find($system->frontuser_id);
        return view('system.edit', ['system' => $system, 'principle' => $principle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, System $system): View
    {
        $system->update(['name' => $request->name, 'location' => $request->location]);
        Frontuser::find($system->frontuser_id)
            ->update(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email]);

        return $this->index();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
