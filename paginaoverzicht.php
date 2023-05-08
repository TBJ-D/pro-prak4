
<head>
<script src="./js/paginaoverzicht.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <?php 
        include_once("header.php");
        echo $_GET["page"];
    ?> 
    <main id="paginaoverzicht">
        <div class="outer">
            <div class="page-nav">
                <ul>
                    <li><a href="?page=index.php">Home</a></li>
                    <li><a href="?page=info.php">Informatie</a></li>
                    <li><a href="?page=contact.php">Contact</a></li>
                    <li><a href="?page=specs.php">Specs</a></li>
                </ul>
                <button id="savechanges" type="button" name="savechanges">Save changes</button>
            </div>
            <div id="pagecontainer" class="page-container">
                <?php
                    require('./config.php');

                    $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
            
                    $pdo = require('util/getPdo.php');
                    $sql = "USE proprak4";
                    $statement = $pdo->prepare($sql);
            
                    $stmt = $pdo->prepare("SELECT content FROM pagecontent WHERE pagename=?");
                    $stmt->execute([$_GET["page"]]);
                    $row = $stmt->fetch();
                    echo $row[0];
                ?>
            </div>
        </div>
    </main>
    
</body>
