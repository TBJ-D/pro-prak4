<head>
    <link rel="stylesheet" href="/scss/contact.scss">
</head>

<body>
    <?php
    include_once("header.php");
    ?>
    <h1>Contact</h1>
    <form action="">
        <label for="email">Email</label><br>
        <input type="text" placeholder="email@email.com"><br>
        <label for="onderwerp">Onderwerp</label><br>
        <input type="text" placeholder="Onderwerp"><br>
        <label for="inhoud">Inhoud</label><br>
        <input type="text" placeholder="Inhoud"><br>

        <input type="radio">Inschrijven voor nieuwsbrief
        <br><br>
        <input type="submit" value="Verstuur">
    </form>

</body>