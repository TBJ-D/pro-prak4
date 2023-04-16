<head>
    <link rel="stylesheet" href="/scss/contact.scss">
</head>


<body>
    <?php
    include_once("header.php");
    ?>

    <div class="form-container">
        <div class="form-background">


            <form action="">

                <h1>Contact</h1>
                <label for="email">Email</label><br>
                <input type="text" id=email placeholder="example@gmail.com"><br>
                <label for="onderwerp">Onderwerp</label><br>
                <input type="text" id="onderwerp"><br>
                <label for="inhoud">Inhoud</label><br>
                <textarea type="text" id="inhoud"></textarea><br>


                <input type="radio" id="radio">
                <label for="radio">Inschrijven voor nieuwsbrief</label>

                <br><br>

                <div class="submit-container">
                    <input type="submit" value="Verstuur" id="submit">
                </div>
            </form>
        </div>
    </div>

</body>