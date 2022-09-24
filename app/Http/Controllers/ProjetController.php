<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ProjetController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    //Return all projet(Gmap)
    public function testtest()//ajax
    {
        return view('/Projet/ViewAllProject');
    }

    public function test()//ajax
    {
        $data= DB::table('Projets')->get();
        $projectdata['data']=$data;
        echo json_encode($projectdata);
        exit;
    }
    public function test2($id)//ajax
    {
        $data= DB::table('Projets')->where('id',$id)->get();
        $projectdata['data']=$data;
      
        echo json_encode($projectdata);
        exit;
    }
    public function show()
    {
        $data= DB::table('Projets')->get();
        return view('Projet',['data'=>$data]);
    }
    //return view update all project(Project Table)
    public function updateView()
    {

        $data= DB::table('Projets')->get()->where('Type','Terminer');


        return view('/Projet/EditProject',['data'=>$data]);
    }
    public function confirm($id)
    {   $data=[
        'Type'=>'Terminer',
        'emp'=>'PROJET VALIDER',
    ];
        \App\Projet::where('id',$id)->update($data);
        return redirect(route('admin.dashboard'));
    }
    //Retuen the view to update pre-selected project
    function view($id)
    {
        $data= DB::table('Projets')->get()->where('id',$id);
        $data2= DB::table('categories')->get();
        return view('/Projet/EditProject(Update)',['data'=>$data,'data2'=>$data2]);
    }
    function updateEmp($dataid, request $request)
    {
        $data=$this->validate($request,[
            'id'=>'',
            'emp'=>'required',
            'Type'=>'required',
        ]
        ,[
            'emp.required'=>'Ce champ est obligatoire.',
        ]);
        $id=$dataid;
        \App\Projet::where('id',$id)->update($data);
        $request->session()->flash('alert', 'User was successful added!');
        return redirect(route('ViewStartedProject'));
    }
    //update and patch the pre-selected project
    function startedproject()
    {
        $data= DB::table('Projets')->get()->where('Type','Encours');
        return view('Projet.ViewProgressPoject',['data'=>$data]);
    }
    function update($id ,request $request)
    {
        $data=$this->validate($request,[
            'id'=>'',
            'Titre'=>'required',
            'adresse'=>'required',
            'cat'=>'required',
            'DateLancement'=>'required',
            'datefinal'=>'',
            'Lat'=>'required ',
            'Lon'=>'required ',
            'Budget'=>'required|regex:/^\d+(\.\d+)*$/',
        ]
        ,[
            'Titre.required'=>'Ce champ est obligatoire.',
            "adresse.required"=>"Ce champ est obligatoire.",
            'cat.required'=>'Ce champ est obligatoire.',
            'DateLancement.required'=>'Ce champ est obligatoire.',
            'lat.required'=>'Ce champ est obligatoire.',
            'Lon.required'=>'Ce champ est obligatoire.',
            'Budget.required'=>'Ce champ est obligatoire.',
            'Budget.regex'=>'Verfier le budget',
            'emp.required'=>'Ce champ est obligatoire.',
            'emp.regex'=>'Ce champ doit doit contenir que des lettres.',
        ]);
        \App\Projet::where('id',$id)->update($data);
        $request->session()->flash('alert', 'User was successful added!');
        return $this->updateView();
    }
    function affect($id)
    {
        $tab=[
            'id'=>$id,
            'mp'=>$id,
        ];

        $data= DB::table('users')->get();
        return view('/Projet/orderAffect',['data'=>$data,'items'=>$tab]);
    }
    function newpoject()
    {
        $data= DB::table('Projets')->get()->where('Type','Nouveau');

        return view('Projet.veiwnewproject',['data'=>$data]);
    }

    //Delete and destroy the project from DB
    function destroy($id)
    {
        \App\Projet::where('id',$id)->delete();
        return $this->updateView();
    }
    //return the view to add a project
    public function index()
    {
        $data= DB::table('categories')->get();
        return view('/Projet/AddProject',['data'=>$data]);
    }
    //Store the project to the database
    public function Store(request $request)
    {
        $data=$this->validate($request,[
            'id'=>'',
            'Titre'=>'required',
            'adresse'=>'required',
            'cat'=>'required',
            'Type'=>'required',
            'DateLancement'=>'required',
            'emp'=>'required|regex:/^[a-zA-Z\s]*$/',
            'con'=>'required|regex:/^[a-zA-Z\s]*$/',
            'DateFinal'=>'',
            'Lat'=>'required ',
            'Lon'=>'required ',
            'Budget'=>'required|regex:/^\d+(\.\d+)*$/',
            ]
        ,[
            'Titre.required'=>'Ce champ est obligatoire.',
            "adresse.required"=>"Ce champ est obligatoire.",
            'cat.required'=>'Ce champ est obligatoire.',
            'DateLancement.required'=>'Ce champ est obligatoire.',
            'lat.required'=>'Ce champ est obligatoire.',
            'Lon.required'=>'Ce champ est obligatoire.',
            'Budget.required'=>'Ce champ est obligatoire.',
            'Budget.regex'=>'Verfier le budget',
            'emp.required'=>'Ce champ est obligatoire.',
            'emp.regex'=>'Ce champ doit doit contenir que des lettres.',
            'con.required'=>'Ce champ est obligatoire.',
            'con.regex'=>'Ce champ doit doit contenir que des lettres.',
        ]);

        \App\Projet::create($data);
        $request->session()->flash('alert', 'User was successful added!');
        return $this->testtest();
    }
    function stat()
    {
        $data1= DB::table('Projets')->get()->where('Type','Nouveau');
        $data2= DB::table('Projets')->get()->where('Type','Encours');
        $data3= DB::table('Projets')->get()->where('Type','Terminer');
        $ldate = date('Y-m-d');
        $data4= DB::table('Projets')->get()->where('Type',"!=",'Terminer')->where('DateFinal','<',$ldate);
        return view('Projet.stat',['data1'=>$data1,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4]);
    }
    function order($empname)
    {
        $data= DB::table('Projets')->get()->where('emp',$empname);
        return view('/Projet/order',['data'=>$data]);
    }


}
