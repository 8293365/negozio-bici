<!-- it ain't translated to laravel yet-->

<!DOCTYPE html>
<html>
<title>Negozio Biciclette</title>
<!-- In Laravel usiamo l'helper asset() per i percorsi -->
<link rel="stylesheet" href="{{ asset('stile.css') }}">

<body>
<header>
    <h1>Negozio Biciclette</h1>
</header>
<nav>
    <p id="utente">
        <!-- route() invece di anchor() -->
        <a href="{{ route('entra') }}">Entra</a> / 
        <a href="{{ route('registrati') }}">Registrati</a>
        
        &nbsp; Benvenuto 
        <span>
            <!-- Accesso alla sessione diverso in Laravel -->

            @if(Session::has('utente'))
                @php
                    $utente = Session::get('utente');
                    @endphp
                @if($utente['nome'] == 'anonimo')
                {{$utente->nome}} ({{$utente->ruolo}})
                &nbsp;

              
            @if($utente->nome != 'anonimo' )
                <a href="{{ route('esci') }}">esci</a>
                <a href="{{ route('miei-ordini') }}">Miei ordini</a>
            @endif
            
        </span>
        
        &nbsp;
        @if(session('utente.nome') != 'anonimo')
            <a href="{{ route('esci') }}">Esci</a>
            <a href="{{ route('miei-ordini') }}">Miei Ordini</a>
        @endif
    </p>
    
    <p>
        <a href="{{ route('home') }}">Pagina Iniziale</a>
        <a href="{{ route('faq') }}">Domande Frequenti</a>
        <a href="{{ route('catalogo') }}">Catalogo</a>
        <a href="{{ route('admin.riservato') }}">Riservato</a>
        
        <!-- Per le immagini usiamo asset() -->
        <a href="{{ route('carrello') }}">
            <img src="{{ asset('images/carrello-della-spesa.png') }}" alt="Carrello">
        </a>
        
        <!-- Count della sessione carrello -->
        <span id="nbici">{{ count(session('carrello', [])) }}</span>
    </p>
</nav>
