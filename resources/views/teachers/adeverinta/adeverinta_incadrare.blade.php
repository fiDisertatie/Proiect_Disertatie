<html>
    <head>
        <meta charset="utf-8" />

        <title>{{ $teacher->fullName() }}</title>

        <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet"/>
    </head>

    <body>
    <div>
        <img class="logo-ministerul-educatiei" src="{{ asset('img/ministerul_educatiei.png') }}"/>

        <img class="logo-ctt mt-3" src="{{ asset('img/logo_ctt.png') }}"/>
    </div>
    <hr class="linie_logo">
    <div class="text-ctt-centru">
        <p><strong>COLEGIUL TEHNIC DE TRANSPORTURI PIATRA-NEAMŢ</strong></p>
        <p>Str. Soarelui nr.1, Cod.610053, Piatra-Neamţ, jud. Neamţ</p>
        <p>Telefon: 0233 / 216163, fax: 0233 / 219058, E-mail: colegiultransporturi@gmail.com </p>
        <p>http://www.cttransporturineamt.ro</p>
    </div>
    <div class="nr_data">
        <p><strong>Nr. {{ $teacher->nr_inregistrare }} din {{ $teacher->data_generare }}</strong></p>
    </div>
    <br>
    <div class="head_adeverinta">
        <p><strong>ADEVERINŢĂ</strong></p>
    </div>
    <br>
    <div class="text_adeverinta">
        <p class="text-adeverinta-p">Adeverim prin prezenta că <strong>{{ $teacher->fullNameWithoutInitial() }}</strong> este cadru didatic {{ mb_strtolower($teacher->statut) }} la {{ ucwords(mb_strtolower($teacher->denumire_unitate)) }} pe catedra de {{ ucwords(mb_strtolower($teacher->disciplina_incadrare)) }}.</p>
        <p class="text-adeverinta-p">Eliberăm prezenta pentru a-i servi la {{ $teacher->foloseste_la }}.</p>
    </div>
    <br>
    <br>
    <br>
    <div class="semnatari">
        <div class="director">
            <p>Director,</p>
            <p>Prof. Daniela MIHĂEȘ</p>
        </div>
        <div class="secretar">
            <p>Secretar,</p>
            <p>Țurcanu Florin Gheorghe</p>
        </div>
    </div>
    </body>
</html>
