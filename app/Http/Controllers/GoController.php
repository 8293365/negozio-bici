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

}
