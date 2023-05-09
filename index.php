


<body>
    <?php
    include_once("header.php");
    require('./config.php');
    require('./lib/DatabaseModel.php');

    $db = new DatabaseModel($dbHost,$dbName,$dbUser,$dbPass);    
    $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";


    $db->query("SELECT content FROM pagecontent WHERE pagename=?");

    $db->execute([basename($_SERVER['PHP_SELF'])]);
    $row = $stmt->fetch();
    echo $row[0];
    ?>

</body>