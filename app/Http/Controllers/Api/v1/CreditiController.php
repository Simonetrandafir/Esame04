<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Crediti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CreditiStoreRequest;
use App\Http\Requests\v1\CreditiUpdateRequest;
use App\Http\Resources\v1\CreditiResource;
use Illuminate\Support\Facades\Gate;

class CreditiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreditiStoreRequest $request)
    {
        $data = $request->validated();
        $config = Crediti::create($data);
        return new CreditiResource($config);
    }

    /**
     * Display the specified resource.
     */
    public function show(Crediti $crediti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreditiUpdateRequest $request, $idCredito)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('admin')){
                $data = $request->validated();
                $crediti = $this->trovaID($idCredito);
                $crediti->fill($data);
                $crediti->save();
                return new CreditiResource($crediti);
            }else {
                abort(403,'CRCU_0004');
            }
        } else {
            abort(404,'CRCU_0005');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crediti $crediti)
    {
        //
    }
    protected function trovaID($id){
        $risorsa = Crediti::findOrFail($id);
        if ($risorsa !== null){
            return $risorsa;
        }else{
            abort(404,'ID non trovato');
        }
    }
}
