


<body>
    <?php
        include_once("header.php");
        require('./config.php');

        $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

        $pdo = require('util/getPdo.php');
        $sql = "USE proprak4";
        $statement = $pdo->prepare($sql);

        $stmt = $pdo->prepare("SELECT content FROM pagecontent WHERE pagename=?");
        $stmt->execute([basename($_SERVER['PHP_SELF'])]);
        $row = $stmt->fetch();
        echo $row[0];
   ?>

</body>