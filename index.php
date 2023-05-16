


<body>
    <?php
    // Haal HTML content op van database
    include_once("header.php");
    require('./config.php');
    require('./lib/DatabaseModel.php');

    $db = new DatabaseModel($dbHost,$dbName,$dbUser,$dbPass);
        
    // Haal HTML content op vanuit database en display het
    $db->query("SELECT content FROM pagecontent WHERE pagename=?");
    $db->execute([basename($_SERVER['PHP_SELF'])]);
    $row = $db->fetch();
    echo $row[0];
    ?>

</body>