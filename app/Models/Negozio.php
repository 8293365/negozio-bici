<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NegozioModel
{
    public function __construct()
    {
        DB::statement("SET lc_messages = 'it_IT'");
    }

    public function get_articoli()
    {
        return DB::table('articoli')
            ->orderBy('id')
            ->get();
    }
    public static function all(){
            return DB::table('articoli')->orderBy('id')->get();
    }

    public function get_ordini($nomecliente)
    {
        return DB::table('ordini')
            ->join('articoli', 'ordini.idArticolo', '=', 'articoli.id')
            ->select(
                'ordini.id as idOrdine',
                'nomeCliente',
                'idArticolo',
                'articoli.nome',
                'ordini.prezzo',
                'dataOra'
            )
            ->where('nomeCliente', $nomecliente)
            ->orderBy('ordini.id')
            ->get();
    }

    public function get_articolo($id)
    {
        return DB::table('articoli')
            ->where('id', $id)
            ->first();
    }

    public function get_utente($nome, $password)
    {
        return DB::table('utenti')
            ->where('nome', $nome)
            ->where('password', $password)
            ->first();
    }

    public function get_password($nome, $email)
    {
        return DB::table('utenti')
            ->where('nome', $nome)
            ->where('email', $email)
            ->first();
    }

    private function random($lunghezza)
    {
        return Str::random($lunghezza);
    }

    public function genera_nuova_password($nome, $email, $hash)
    {
        $messaggio = '';
        $nuovaPassword = $this->random(8);
        $nuovoHash = md5($nuovaPassword);

        $updated = DB::table('utenti')
            ->where('nome', $nome)
            ->where('email', $email)
            ->where('hash', $hash)
            ->update([
                'password' => $nuovaPassword,
                'hash' => $nuovoHash,
            ]);

        if ($updated === 0) {
            $messaggio = 'ERRORE: utente non trovato!';
        } else {
            $messaggio = "La nuova password è " . $nuovaPassword;
        }

        return $messaggio;
    }

    public function inserisci_ordine($nomecliente, $carrello)
    {
        $messaggioDiErrore = null;

        DB::beginTransaction();
        try {
            foreach ($carrello as $merce) {
                DB::table('ordini')->insert([
                    'nomeCliente' => $nomecliente,
                    'idArticolo' => $merce->id,
                    'prezzo' => $merce->prezzo,
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $messaggioDiErrore = $e->getMessage();
        }

        return $messaggioDiErrore;
    }

    public function inserisci_utente($nome, $password, $ruolo, $email)
    {
        $messaggioDiErrore = null;

        try {
            DB::table('utenti')->insert([
                'nome' => $nome,
                'password' => $password,
                'ruolo' => $ruolo,
                'email' => $email,
                ]);
        } catch (\Exception $e) {
            $messaggioDiErrore = $e->getMessage();
        }

        return $messaggioDiErrore;
    }

    public function conferma_utente($nome)
    {
        $messaggioDiErrore = null;

        try {
            DB::table('utenti')
                ->where('nome', $nome)
                ->update(['confermato' => 'si']);
        } catch (\Exception $e) {
            $messaggioDiErrore = $e->getMessage();
        }

        return $messaggioDiErrore;
    }
}
