<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    function viewAdd()
    {
        $data= DB::table('roles')->get();
        return view ('/employe/AjoutEmploye',['data'=>$data]);
    }
    function Store(request $request)
    {
            $request->password=bcrypt($request->password);
            $data=$this->validate($request,[
            'cin'=>'required|digits:8|numeric|unique:users,cin',
            'name'=>'required|regex:/^[a-zA-Z\s]*$/',
            'email'=>'required|email|unique:users,email',
            'role'=>'required',
            'password' =>'',
            'cpassword'=>'required|same:password|between:4,16'
        ],
        [
            'cin.required'=>'Ce champ est obligatoire.',
            'cin.digits'=>'Ce champ doit contenir 8 chiffres.',
            'cin.unique'=>'Ce cin a déja été pris en compte.',
            'cin.numeric'=>'Ce champ doit  contenir 8 chiffres.',
            'name.required'=>'Ce champ est obligatoire.',
            'email.email'=>'Ce champ doit être un email valide',
            'email.required'=>'Ce champ est obligatoire.',
            'email.unique'=>'Cette adresse a déja été pris en compte.',
            'name.regex'=>'Ce champ doit doit contenir que des lettres.',
            'role.required'=>'Ce champ est obligatoire',
            'password.required' =>'Ce champ est obligatoire',
            'password.same' =>'Ce champ doit être identique à la confirmation du mot de passe',
            'password.between'=>'Ce champ doit être entre 4 et 16 caractères',
            'cpassword.required' =>'Ce champ est obligatoire',
            'cpassword.same' =>'Ce champ doit être identique au mot de passe',
            'cpassword.between'=>'Ce champ doit être entre 4 et 16 caractères',
        ]);
        \App\user::create($data);
        $request->session()->flash('alert', 'User was successful added!');
        return redirect()->route('admin.users');
    }
    function view()
    {
        $data= DB::table('users')->get();
        return view('viewemp',['data'=>$data]);
    }

    function edit($id)
    {
        $data= DB::table('employes')->get()->where('id',$id);
        return view('editemp',['data'=>$data]);
    }

    function destroy($id)
    {
        \App\employe::where('id',$id)->delete();
        return $this->view();
    }

    function update($id)
    {
        $data=request()->validate([
            'cin'=>'',
            'nom'=>'',
            'pnom'=>'',
            'projet'=>'',
        ]);
        \App\employe::where('id',$id)->update($data);
        return $this->view();
    }
    function testtest($id)
    {

        return view ('/projet/testtest');
    }
}

