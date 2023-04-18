<!-- <head>
    <link rel="stylesheet" href="/scss/contact.scss">
</head> -->


<body>
    <?php
    include_once("header.php");
    ?>

    <div class="form-container">
        <div class="form-background">


            <form method="post" action="contact_backend.php">

                <h1>Contact</h1>
                <label for="email">Email</label><br>
                <input name="email" type="text" id=email placeholder="example@gmail.com" required><br>
                <label for="onderwerp">Onderwerp</label><br>
                <input name="onderwerp" type="text" id="onderwerp" required><br>
                <label for="inhoud">Inhoud</label><br>
                <textarea name="inhoud" type="text" id="inhoud"></textarea><br>

                <input name="inschrijven" type="radio" id="radio">
                <label for="radio">Inschrijven voor nieuwsbrief</label>

                <br><br>

                <div class="submit-container">
                    <input type="submit" value="Verstuur" id="submit">
                </div>
            </form>
        </div>
    </div>
</body>