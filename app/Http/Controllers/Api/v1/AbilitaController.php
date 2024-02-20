<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Abilita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\AbilitaResource;
use Illuminate\Support\Facades\Gate;

class AbilitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                return Abilita::all();
            } else {
                abort(403,'ACI_0001');
            }
        }  else {
            abort(404, 'ACI_0002');
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
    public function show($idAbilita)
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $abilita = Abilita::find($idAbilita);
                if (!$abilita) {
                    // Gestisci il caso in cui lo abilita non esista
                    abort(404, 'ACS_0003 Non Trovato');
                }else{
                    return new AbilitaResource($abilita);
                }
            } else {
                abort(403,'ACS_0004 Non Autorizzato');
            }
        }  else {
            abort(404, 'ACS_0005');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Abilita $abilita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abilita $abilita)
    {
        //
    }
}
