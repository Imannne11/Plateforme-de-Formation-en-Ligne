<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score Final</title>
    <link rel="icon" type="image/png" sizes="64x64" href="../Media/file (3).png">
    <title>warProg</title>
</head>

<body>
    <div class="container" id="container">
        <div class="score-container">
            <h2>Score final:</h2>
            <p><?php echo isset($_GET['score']) ? intval($_GET['score']) : 0; ?></p>
        </div>
    </div>
</body>

</html>