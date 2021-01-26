<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    public function index(Request $request){

        $slide = Slide::select('*');

        if($request->has('data_inicial')){
            $slide->where('data_inicial',$request->data_inicial);
        }

        if($request->has('data_inicial') && $request->has('data_final')){
            $slide->whereBetween();
        }
        return $slide->paginate();
    }

    public function store(Request $request){
     
        $request->validate([
            "imagem"=>"required|file|max:512",
            "url"=> "url"
        ]);
    
        $imagem = $request->imagem;
        $path = $imagem->store('','public_images');
        $slide = Slide::create([ 'imagem' => $path]);
        $slide->update($request->except('imagem'));
        
        return $slide;
    }

    public function show(Slide $slide){
        return $slide;
    }

    public function update(Request $request, Slide $slide){
        $imagem = $request->only("imagem");
        $slide = Slide::update($request->except('imagem'));
        $slide->imagem = $file->store('','public_images');
        $slide->save();
        return $slide;

    }

    public function destroy(Slide $slide){
        if($slide->delete()){
            return true;
        };
        return false;
    }
}
