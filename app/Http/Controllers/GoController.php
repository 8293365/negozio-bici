<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Negozio;
class GoController extends Controller


{
    protected $negozio;

    public function __construct(Negozio $negozio)
    {
        $this->negozio = $negozio;
    }

    public function index(){

        return view('home');//main view and the same with the other ones
    }


    public function home(){

        return view('home');
    }

    public function esci(){

        return view('esci');
    }
    public function login(){

        return view('login');
    }
    public function registrati(){

        return view('registrati');
    }
    public function recuperaPassword(){

        return view('recuperaPassword');
    }
    public function confermaEmail(){

        return view('confermaEmail');
    }
    public function confermaEmailInviata(){

        return view('confermaEmailInviata');
    }
    public function confermaEmailRicevuta(){

        return view('confermaEmailRicevuta');
    }
    public function confermaEmailErrore(){

        return view('confermaEmailErrore');
    }
    
    public function faq(){

        return view('faq');
    }

    
    public function catalog(){
        //$articoli = Negozio::all();
        $articoli = $this->negozio->getArticoli();
        return view('catalog', compact('articoli'));
    }

    public function dettaglio($id){
        //$articoli = Negozio::all();
        $articolo = $this->negozio->get_Articolo($id);
        if(isset($articolo)){
            return view('dettaglio', compact('articoli'));}
            else{
                $articolo['messaggio']="L'articolo nin esiste!";
                return view('errore',compact('articolo'));
            }
    }

    public function about(){

        return view('about');
    }
    public function contact(){

        return view('contact');
    }
    public function privacy(){

        return view('privacy');
    }
    public function terms(){

        return view('terms');
    }
    public function blog(){
        $articoli = $this->negozio->getArticoli();
        return view('blog', compact('articoli'));
    }
    public function blogPost($slug){
        $articolo = $this->negozio->get_Articolo($slug);
        if(isset($articolo)){
            return view('blogPost', compact('articolo'));}
            else{
                $articolo['messaggio']="L'articolo nin esiste!";
                return view('errore',compact('articolo'));
            }
    }
    public function errore($messaggio){
        return view('errore', compact('messaggio'));
    }
    public function errore404(){
        return view('errore404');
    }
    public function errore500(){
        return view('errore500');
    }
    public function errore403(){
        return view('errore403');
    }
    public function errore401(){
        return view('errore401');
    }
    public function errore400(){
        return view('errore400');
    }
    public function errore405(){
        return view('errore405');
    }
    public function errore408(){
        return view('errore408');
    }

}
