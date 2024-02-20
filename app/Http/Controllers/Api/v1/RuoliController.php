<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\v1\RuoliResource;
use App\Models\Ruoli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\RuoliCollection;
use Illuminate\Support\Facades\Gate;

class RuoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $ruoli = Ruoli::all();
                return new RuoliCollection($ruoli);
            } else {
                abort(403,'RC_0001');
            }
        }  else {
            abort(404, 'RC_0002');
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
    public function show($idRuolo)
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $ruolo = Ruoli::find($idRuolo);
                if (!$ruolo) {
                    // Gestisci il caso in cui lo stato non esista
                    abort(404, 'RC_0003');
                }else{
                    return new RuoliResource($ruolo);
                }
            } else {
                abort(403,'RC_0004 Non Autorizzato');
            }
        }  else {
            abort(404, 'RC_0005');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruoli $ruoli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruoli $ruoli)
    {
        //
    }
}
