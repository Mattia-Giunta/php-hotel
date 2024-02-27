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

// copia del database
$filterHotels = $hotels;

// condizione per scegliere solo glo hotel col parcheggio
// bonus 1
if( isset($_GET['parcheggio']) && $_GET['parcheggio'] == '1'){
    $hotelWithPark = [];

    foreach($filterHotels as $element){
        if($element['parking']){
            $hotelWithPark[] = $element;
        }
    }

    $filterHotels = $hotelWithPark;

}

// bonusc 2
if(isset($_GET['vote']) && $_GET['vote'] !== ''){
    $hotelWithPark = [];

    foreach($filterHotels as $element){
        if($element['vote'] >= $_GET['vote']){
            $hotelWithPark[] = $element;
        }
    }

    $filterHotels = $hotelWithPark;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>PHP Hotels</title>
</head>


<body  data-bs-theme='dark'>


    <main class="container pt-5 ">

        <h1>Hotels</h1>

        
        <form class="mb-5" action="index.php" method="get">

            <div class="row py-4 ">

                <div class="col-6">

                    <label for="parcheggio" class="form-label">Parcheggio</label>

                    <select name="parcheggio" id="parcheggio">
                        <option value="">--scegli--</option>
                        <option value="1">con parcheggio</option>
                    </select>

                    
                </div>
                <div class="col-6">

                    <div>  
                        <label class="form-label" for="vote">Voto</label>
                        <input type="number" min="0" max="5" name="vote" id="vote">
                    </div>

                </div>
                

            </div>

            <button class="btn btn-primary ">Invia</button>
            
        </form>

        <div class="d-flex">

            <?php foreach($filterHotels as $element): ?>
            <div class="card" style="width: 18rem;">

                <img src="./img/hotel.jpg" class="card-img-top" alt="...">

                <div class="card-body">

                    <h5 class="card-title">
                        <?= $element['name'] ?>
                    </h5>

                    <p class="card-text">
                        <?= $element['description'] ?>
                    </p>

                    <p class="card-text">
                        <?= ($element['parking']) ? 'SI' : 'NO'  ?>
                    </p>

                    <p class="card-text">
                        <?=  $element['vote']  ?>
                    </p>

                    <p class="card-text">
                    <?=  $element['distance_to_center'] .'km'  ?>
                    </p>

                </div>

            </div>
            <?php  endforeach ?>

        </div>


    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>