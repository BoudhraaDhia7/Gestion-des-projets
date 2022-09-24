<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class indexController extends Controller
{
    public function Nv()//ajax
    {
        $data= DB::table('Projets')->where('Type','Nouveau')->get();
        $datax['data']=$data;
        
        echo json_encode($datax);
        exit;
    }
    public function Enc()//ajax
    {
        $data= DB::table('Projets')->where('Type','Encours')->get();
        $projectdata['data']=$data;
        echo json_encode($projectdata);
        exit;
    }
    public function Ter()//ajax
    {
        $data= DB::table('Projets')->where('Type','Terminer')->get();
        $projectdata['data']=$data;
        echo json_encode($projectdata);
        exit;
    }
    public function test()//ajax
    {
        $data= DB::table('Projets')->get();
        $projectdata['data']=$data;
      
        echo json_encode($projectdata);
        exit;
    }
}
