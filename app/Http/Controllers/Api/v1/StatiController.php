<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Stati;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\StatiCollection;
use App\Http\Resources\v1\StatiResource;
use Illuminate\Support\Facades\Gate;

class StatiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $ruoli = Stati::all();
                return new StatiCollection($ruoli);
            } else {
                abort(403,'SCI_0001');
            }
        }  else {
            abort(404, 'SCI_0002');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($idStato)
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $stato = Stati::find($idStato);
                if (!$stato) {
                    // Gestisci il caso in cui lo stato non esista
                    abort(404, 'SCS_0003 Non Trovato');
                }else{
                    return new StatiResource($stato);
                }
            } else {
                abort(403,'SCS_0004 Non Autorizzato');
            }
        }  else {
            abort(404, 'SCS_0005');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stati $stati)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stati $stati)
    {
        //
    }
}
