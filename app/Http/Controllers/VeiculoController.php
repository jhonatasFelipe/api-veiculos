<?php

namespace App\Http\Controllers;
use App\Veiculo;
use App\Motor;
use App\Modelo;
use App\Marca;
Use App\Combustivel;
use App\Ano;
use App\Imagem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VeiculoController extends Controller
{
    public $imagens ;
    public function  construct(Imagem $imagem){
    $this->imagens = $imagem;
   }

   public function persistirDados(Request $request, Veiculo $veiculo){

   
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        if($request->has('de')){

        }
        $anoInicial = $request->query('de');
        $anoFinal = $request->query('ate');
        $precoInicial = $request->query('precoInicial');
        $precoFinal = $request->query('precoFinal');
        $parametros = $request->query();

        $veiculos = Veiculo::joinVeiculo();
        if($request->has('marca')){
            $veiculos->where('marca.nome',$request->query('marca'));
        }

        if($request->has('modelo')){
            $veiculos->where('modelo.nome',$request->query('modelo'));
        }

        if($request->has('motor')){
            $veiculos->where('motor.potencia',$request->query('motor'));
        }
            
        if($anoInicial){
            $veiculos->whereBetween('ano.ano', [$anoInicial , $anoFinal]);
        }
        if($precoInicial){
            $veiculos->whereBetween('preco' , [$precoInicial,$precoFinal]);
        }
        
        return $veiculos->get();


    
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
        $request->validate([
            "motor" => "required",
            "marca" => "required",
            "modelo" => "required",
            "combustivel"=>"required",
            "ano" => "required",
            "imagens" =>"required",
         ]);
         $motor =  Motor::where('potencia',$request->motor)->first();
         $marca = Marca::where('nome', $request->marca)->first();
         $modelo= Modelo::where('nome', $request->modelo)->first();
         $combustivel = Combustivel::where('nome', $request->combustivel)->first();
         $ano = Ano::where('ano',$request->ano)->first();

         $veiculo = Veiculo::create([
             'motor'=> $motor->id,
             'marca'=> $marca->id,
             'modelo'=>$modelo->id,
             'combustivel' => $combustivel->id,
             'ano'=>$ano->id,
             'preco'=>$request->preco,
             'obs'=>$request->obs,
         ]);

        $files = $request->file('imagens');
         $paths = [];
         if($request->hasfile('imagens')){
             foreach($files as $file){
                 array_push($paths ,\env('PUBLIC_IMAGES').$file->store('','public_images')) ;
             }
         }
         // retira as imagens da request
         $semimagens = \array_diff_key($request->all(),['imagens' =>'', 'acessorios'=>'']);
         //grava sem aimagens no banco
         $capa = true;
         foreach($paths as $path){
             $veiculo->imagens()->create([
                 'veiculo' => $veiculo->id,
                 'path' => $path,
                 'capa'=> $capa
             ]);
             $capa = false;
         }
         //adiciona os acessorios; 
         $acessorios = [];
         if(!empty($request->acessorios)){
                $acessorios= explode(',',$request->acessorios);
         }
        $veiculo->acessorios()->sync($acessorios);
         return $veiculo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Veiculo $veiculo)
    {
        $result = Veiculo::joinVeiculo();
        $result->where('veiculo.id','=',$veiculo->id);
        return $result->get()[0];
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
    public function update(Request $request, Veiculo $veiculo)
    {
        $request->validate([
            "motor" => "required",
            "marca" => "required",
            "modelo" => "required",
            "combustivel"=>"required",
            "ano" => "required",
            "imagens" =>"required",
         ]);

         $motor =  Motor::where('potencia',$request->motor)->first();
         $marca = Marca::where('nome', $request->marca)->first();
         $modelo= Modelo::where('nome', $request->modelo)->first();
         $combustivel = Combustivel::where('nome', $request->combustivel)->first();
         $ano = Ano::where('ano',$request->ano)->first();

         $veiculo->motor = $motor->id;
         $veiculo->marca = $marca->id;
         $veiculo->modelo = $modelo->id;
         $veiculo->combustivel = $modelo->id;
         $veiculo->ano = $ano->id;
         $veiculo->preco = $request->preco;
         $veiculo->obs = $request->obs;
         $veiculo->save();
         
         $files = $request->file('imagens');
         $paths = [];
         if($request->hasfile('imagens')){
             foreach($files as $file){
                 array_push($paths ,\env('PUBLIC_IMAGES').$file->store('','public_images')) ;
             }
         }
         
         $capa = true;
         foreach($paths as $path){
             $veiculo->imagens()->create([
                 'veiculo' => $veiculo->id,
                 'path' => $path,
                 'capa'=> $capa
             ]);
             $capa = false;
         }
         //adiciona os acessorios; 
         $acessorios = [];
         if(!empty($request->acessorios)){
                $acessorios= explode(',',$request->acessorios);
         }
        $veiculo->acessorios()->sync($acessorios);
        $result =  Veiculo::joinVeiculo()->where('veiculo.id','=',$veiculo->id);
        return $result->get()[0];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veiculo $veiculo)
    {
        return $veiculo->delete();
    }


    
}
