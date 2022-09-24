<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CatController extends Controller
{
    //Afficher tout les categorie
    function view()

    {
        $data= DB::table('categories')->get();
        return view('/categorie/ViewCat',['data'=>$data]);
    }
    //afficher interface d'ajout des categorie
    function add()
    {
        return view("/categorie/AddCat");
    }
    //Ajouter categore->BDD apres aficher tout les catégorie
    function store(request $request)
    {
        $data=$this->validate($request,[
            'Libelle'=>'required',
        ]);
        \App\Categories::create($data);
        $request->session()->flash('alert', 'User was successful added!');
        return $this->view();
    }
    //Afficher l'interface De modification des Categorie
    function edit($id)
    {
        $data= DB::table('Categories')->get()->where('id',$id);
        return view('/categorie/EditCatView',['data'=>$data]);
    }
    //Update/modifier une catrégorie
    function update($id, request $request)
    {
        $data=request()->validate([
            'id'=>'',
            'Libelle'=>'',
        ]);
        \App\Categories::where('id',$id)->update($data);
        $request->session()->flash('alert', 'User was successful added!');
        return $this->view();
    }
    function destroy($id)
    {
        \App\Categories::where('id',$id)->delete();
        return $this->view();
    }
}
