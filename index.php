


<body>
    <?php
        include_once("header.php");
        require('./config.php');
        require('./lib/Database.php');

        require('./lib/Database.php');

        $db = new Database($dbHost,$dbName,$dbUser,$dbPass);    
        $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

        $db->query("SELECT content FROM pagecontent WHERE pagename=?");

        $db->execute([basename($_SERVER['PHP_SELF'])]);
        $row = $db->fetch();
        echo $row[0];
   ?>

</body>