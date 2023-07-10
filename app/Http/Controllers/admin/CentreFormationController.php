<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CentreFormation;
use Illuminate\Http\Request;

class CentreFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['centres'] = CentreFormation::orderBy('id', 'desc')->paginate(5);
        return view('admin.centre.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.centre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomCentre' => 'required',
            'adresseCentre' => 'required',
            'mailCentre' => 'required',
            'telephoneCentre' => 'required',
            'estInternation' => 'required',
            'dateFondation' => 'required',
        ]);

        $centre = new CentreFormation;
        $centre->nomCentre = $request->nomCentre;
        $centre->adresseCentre = $request->adresseCentre;
        $centre->mailCentre = $request->mailCentre;
        $centre->telephoneCentre = $request->telephoneCentre;
        $centre->estInternation = $request->estInternation;
        $centre->dateFondation = $request->dateFondation;
        $centre->save();

        return redirect()->route('admin.centre.index')
            ->with('success', 'Centre de Formation créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CentreFormation  $centre
     * @return \Illuminate\Http\Response
     */
    public function show(CentreFormation $centre)
    {
        return view('admin.centre.show', compact('centre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CentreFormation  $centre
     * @return \Illuminate\Http\Response
     */
    public function edit(CentreFormation $centre)
    {
        return view('admin.centre.edit', compact('centre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CentreFormation  $centre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CentreFormation $centre)
    {
        $request->validate([
            'nomCentre' => 'required',
            'adresseCentre' => 'required',
            'mailCentre' => 'required',
            'telephoneCentre' => 'required',
            'estInternation' => 'required',
            'dateFondation' => 'required',
        ]);

        $centre->nomCentre = $request->nomCentre;
        $centre->adresseCentre = $request->adresseCentre;
        $centre->mailCentre = $request->mailCentre;
        $centre->telephoneCentre = $request->telephoneCentre;
        $centre->estInternation = $request->estInternation;
        $centre->dateFondation = $request->dateFondation;
        $centre->save();

        return redirect()->route('admin.centre.index')
            ->with('success', 'Centre de Formation mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CentreFormation  $centre
     * @return \Illuminate\Http\Response
     */
    public function destroy(CentreFormation $centre)
    {
        $centre->delete();
        return redirect()->route('admin.centre.index')
            ->with('success', 'Centre de Formation supprimé avec succès.');
    }
}


