<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        p {
            font-size: 12pt;
            line-height: 1.5;
        }
    </style>
</head>
<body style="margin-right: 30px; margin-left: 30px;">

    <img src="{{ asset('storage/img/Son.jpg') }}" width="250" height="130" style="margin-bottom: -20px;">
    
    <div style="text-align: left;">
        <p><strong>Direction Corporate Ressources Humaines <br>
            Direction IAP <br>
            Direction Gestion du Personel <br>
            Département Administration du Personel <br>
            N°/______/DCP-RHU/IAP/GPR/<?php echo date('Y'); ?>
        </strong></p>
    </div>

    <br>
        <p class="h4" style="text-decoration: underline; text-align:center; font-size : 20px"><strong>ATTESTATION DE STAGE</strong></p>
    <br>
    <p>Je soussigné, Monsieur XXXXXX XXXXXX, Directeur Gestion du Personnel, atteste par la présente que M/Mme/Mlle {{ $infostagiaire->last_name }} {{ $infostagiaire->first_name }}, Né(e) le <span style="white-space: nowrap;">{{ date('d/m/Y', strtotime($infostagiaire->date_of_birth)) }}</span> à <span style="white-space: nowrap;">{{ $infostagiaire->place_of_birth }}</span>, a effectué, au sein de Sonatrach/IAP, un stage pratique de <span style="white-space: nowrap;">
        <?php
            $start_date = new DateTime($infostagiaire->Stage->start_date);
            $end_date = new DateTime($infostagiaire->Stage->end_date);
            $duration = $start_date->diff($end_date)->format("%a");
            echo $duration;
        ?> jours</span> dans la spécialité <span style="white-space: nowrap;">{{ $infostagiaire->stage->specialite->name }}</span>, du <span style="white-space: nowrap;">{{ date('d/m/Y', strtotime($infostagiaire->Stage->start_date)) }}</span> au <span style="white-space: nowrap;">{{ date('d/m/Y', strtotime($infostagiaire->Stage->end_date)) }}</span>.</p>

        
        
            <br>
        <p>La présente attestation est délivrée à la demande de l'intéressée, pour servir et valoir ce que de droit.</p>

        <br>
            <div style="text-align: right;">
                <p class="float-end">Fait à Boumerdes, le <?php echo date('Y/m/d'); ?></p>
            </div>
            <br>

            <p><strong>Le Directeur Gestion du Personnel</strong></p>
            <p><strong>XXXX Xxxxxx</strong></p>
            <br>
            <br>
            <br>
            <br>

        <p style="text-align: center;">Il n'est délivré qu'un seul exemplaire original de cette attestation.</p>
        
        <hr style="border-top: 2px solid black;">


       
            <p style="text-align: center; font-size: 11px">SONATRACH/ Direction IAP.Avenue de 1er Novembre, Boumerdes 35000, Algérie. Tél: +213 24 79 57 00/ Fax: +213 24 79 57 21 </p>

            <p style="text-align: center; font-size: 11px">Email : iap@sonatrach.dz</p>
        
</body>
</html>