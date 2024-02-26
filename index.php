<?php 
// Descrizione

// Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G
// Stampare tutti i nostri hotel con tutti i dati disponibili.

// Iniziate in modo graduale.

// Prima stampate in pagina i dati, senza preoccuparvi dello stile.

// Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.

// Bonus:
// 1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
// 2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)

// NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
// Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel.
// codepile.netcodepile.net

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotels</title>
</head>
<body>
    

<ul>
    <!-- ciclo per mettere a schermo la lista degli Hotel e le varie descrizioni  -->
    <?php foreach($hotels as $element): ?>
        
        <li>
            
            <?= '<p>'. $element['name'] . '</p>'  ?>
            
            <?= '<p>'. $element['description'] . '</p>'  ?>
            
            <!-- condizione per mettere o no il parcheggio -->
            <?php if($element['parking']){
                echo '<p>Parking: SI</p>';
            }else{
                echo '<p>Parking: NO</p>';
            };
            
            '<p>'. 'Parking:' . $element['parking'] . '</p>'  ?>
             
            <?= '<p>'. 'Voto - ' . $element['vote'] . '</p>'  ?>
            
            <?= '<p>'. 'Distanza dal Centro: Km'. $element['distance_to_center'] . '</p>'  ?>
            
        </li>

    <?php  endforeach ?>


</ul>
    
</body>
</html>