<?php

namespace App\Http\Controllers;
use App\Imagem;

use Illuminate\Http\Request;

class ImagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $veiculo = $request->query('veiculo');
        return Imagem::where('veiculo',$veiculo)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagem $Imagem)
    {
       return $Imagem->delete();
    }


    public function mudacapa(Request $request, Imagem $imagem){
        $imagensMesmoVeiculo = Imagem::where('veiculo',$imagem->veiculo)->get();
        foreach($imagensMesmoVeiculo as $image ){
            if($image->id == $imagem->id){
                $image->capa = true;
            }
            else{
                $image->capa = false;
            }
            $image->update();
        }
        return Imagem::where('Veiculo',$imagem->veiculo)->get();

    }
}
