<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use \App\numbersallreadysend;
use App\Mail\GovMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
class MessageController extends Controller
{
    function index()
    {
        $data= DB::table('messages')->get();
        return view('/Message/MessageView',['data'=>$data]);
    }
    function newMsg()
    {
        return view('/Message/NewMsg');
    }
    function store(request $request)
    {
        $data=request()->validate([
            'id'=>'',
            'Sender'=>'required',
            'Sujet'=>'required',
            'Msg'=>'required',
        ]
        ,[
            'Sender.required'=>'Ce champ est obligatoire.',
            "Sender.regex"=>"Enter une adresse email valide",
            "Sujet.required"=>"Ce champ est obligatoire.",
            'Msg.required'=>"Ce champ est obligatoire.",

        ]);
        \App\Message::create($data);
        $request->session()->flash('alert', 'Msg was successful transfered!');
       return redirect('/admin/dashboard');
    }
    function map()
    {
        return view("map");
    }
    function Storeuser(request $request)
    {

        $data=request()->validate([
            'id'=>'',
            'Sender'=>'required|email',
            'Sujet'=>'required',
            'Msg'=>'required',
            'Number'=>'required|digits:8|numeric|unique:numbersAllreadySends,Number',
        ]
        ,[
            'Sender.required'=>'Ce champ est obligatoire.',
            "Sender.email"=>"Enter une adresse email valide",
            "Sujet.required"=>"Ce champ est obligatoire.",
            'Msg.required'=>"Ce champ est obligatoire.",
            'Number.required'=>'Ce champ est obligatoire.',
            'Number.digits'=>'Ce champ doit contenir 8 chiffres.',
            'Number.unique'=>'Ce Num a déja été pris en compte.',
            'Number.numeric'=>'Ce champ doit  contenir 8 chiffres.',
        ]);


        $six_digit_random_number = random_int(100000, 999999);
        $data2=
        [
            'Number'=>$data['Number'],
            'Code'=>$six_digit_random_number,

        ];


        Nexmo::message()->send([
            'to'=>'216'.$data2['Number'],
            'from'=>'21656523400',
            'text'=>'Votre code de vérification :'.$data2['Code'],
        ]);



        \App\numbersallreadysend::create($data2);
         return view('home.verifview',['data1'=>$data ,'data2'=>$data2]);
    }
    function VerifView(request $request)
    {

        $data=$this->validate($request,[
            'Code'=>'exists:numbersallreadysends,Code',
            'Sender'=>'required|email',
            'Sujet'=>'required',
            'Msg'=>'required',
            'Number'=>'required',

        ]
        ,[
            'Code.exists'=>'Verifier le code de validation',
            'Sender.required'=>'Ce champ est obligatoire.',
            "Sender.email"=>"Enter une adresse email valide",
            "Sujet.required"=>"Ce champ est obligatoire.",
            'Msg.required'=>"Ce champ est obligatoire.",


        ]);


        $data2=
        [
            'Sender'=>$data['Sender'],
            'Sujet' =>$data['Sujet'],
            'Msg'   =>$data['Msg'],
           'Number'=>$data['Number'],
        ];


        \App\Message::create($data2);
        $request->session()->flash('alert', 'Msg was successful transfered!');
        return view('home.index');
    }
    function destroy($id)
    {
        \App\Message::where('id',$id)->delete();
        return null;
    }
    function replyView($email,$sujet)
    {
        return view("Message.replyView",['email'=>$email ,'sujet'=>$sujet]);
    }
    function send(request $request)
    {
        $data=$this->validate($request,[
            'Sender'=>'required|email',
            'Sujet'=>'required',
            'Msg'=>'required',
        ]
        ,[
            'Sender.required'=>'Ce champ est obligatoire.',
            "Sender.email"=>"Enter une adresse email valide",
            "Sujet.required"=>"Ce champ est obligatoire.",
        ]);
        $mail=
        [
            'Title'=>'Rep: Gouvernorat Kairouan',
            'Body'=>$data['Msg'],
        ];
        Mail::to($data['Sender'])->send(new GovMail($mail));
        $request->session()->flash('alert', 'Msg was successful transfered!');
        return redirect('/admin/dashboard');
    }
}
