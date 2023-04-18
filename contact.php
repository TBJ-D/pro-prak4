<head>
    <link rel="stylesheet" href="/scss/contact.scss">
</head>
<body>
    <?php
    include_once("header.php");
    ?>

<div class="flex">
     <div class="form-content">
   
   
    <form action="">

       <h1>Contact</h1>  
        <label for="email">Email</label><br>
        <input type="text" id=email><br>
        <label for="onderwerp">Onderwerp</label><br>
        <input type="text" id="onderwerp"><br>
        <label for="inhoud">Inhoud</label><br>
        <input type="text" id="inhoud" style="height: 50px; width: 200px; padding: 10px;">><br>

        <input type="radio" id="radio">Inschrijven voor nieuwsbrief<br>
        <br><br>
        <input type="submit" value="Verstuur" id="submit">
    </form>
</div>
</div>

</body>