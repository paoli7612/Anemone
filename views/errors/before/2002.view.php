<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link id="theme_link" rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-green.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url('/back.png');
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="/favicon.ico">
</head>

<body>

    <div class="w3-bar w3-xlarge w3-center ">
        <div class="w3-bar w3-left w3-card" style="border-radius: 0px 0px 10px 0px;">
            <a href="/archive" class="w3-bar-item w3-button w3-theme ">
                <i class="fa-solid fa-box"></i>
            </a>
            <a href="/money" class="w3-left w3-button w3-theme ">
                <i class="fa-solid fa-money-bill"></i>
            </a>
        </div>
        <div class="w3-card w3-right" style="border-radius: 0px 0px 0px 10px;">
            <a style="border-radius: 0px 0px 0px 10px;" href="/dipendente" class="w3-right w3-button w3-theme  ">
                <span class="w3-hide-small w3-hide-medium">
                </span>
                <i class="fa-solid fa-user"></i>
            </a>
        </div>
    </div>
    <div class="w3-content">
        <div class="w3-panel w3-red w3-card-4 w3-center">
            <h1>
                Errore!
            </h1>
        </div>
        <div class="w3-panel w3-theme w3-card-4 w3-round-large">
            <pre><?= $exception->getMessage() ?></pre>
            <a href="/" class="w3-btn w3-card w3-white w3-round-large w3-right w3-margin">Riprova</a>
        </div>
    </div>
</body>

</html>