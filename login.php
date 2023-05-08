

<body>
    <?php 
        include_once("header.php");
    ?> 
    <main id="register">
        <div class="form-container form-background">
            <form method="post" action="login_backend.php">
                    <?php 
                    
                    require('./util/encryption.php');
                   
                    
                    function getBerichten() {

                        require('./config.php');
                        $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
                        $email = $_COOKIE['email'];
                        $pdo = require('util/getPdo.php');

                        $sql = "USE proprak4";
                        $statement = $pdo->prepare($sql);

                        $stmt = $pdo->prepare("SELECT * FROM emails WHERE email=?"); 
                        $stmt->execute([$email]); 
                        $res = $stmt->fetchAll();
                        return $res;
                    }
                    // Als gebruiker niet is ingelogd, dus !isset($_COOKIE["user"]); Display login pagina. Anders display berichten dashboard.
                    if(!isset($_COOKIE["user"])) {
                        echo <<<END
                        <h1>Login</h1>
                        <label for="email">Email</label>
                        <input name="email" type="text" id="email" placeholder="Email" required>
                        <label for="password">Password</label>
                        <input name="password" type="password" id="password" placeholder="Password" required>
                        <div id="buttons">
                        <button type="submit" class="default">Inloggen</button>
                        <a href="register.php"><button type="button" class="default">Registreer</button></a>
                        </div>
                        END;
                    }else {


                        // Bericht template
                        $bericht = `
                        <div class="bericht">
                            <span>Time sent:</span>
                            <span>Subject:</span>
                            <span>Content:</span>
                        </div>
                        `;
                        // Haal de gebruikers berichten op.
                        $berichten = getBerichten();
                        $str = "";
                        // Voeg aan de lege string alle berichten toe.
                        foreach ($berichten as $bericht) {
                            
                            $subject = $bericht['subject'];
                            $content = $bericht['content'];
                            $str .= <<<END
                            <div class="bericht">
                                <span>Subject: $subject</span>
                                <span>Content: $content</span>
                            </div>
                            END;
                        }
                        // Display alle berichten gestuurd door de gebruiker.
                        echo <<<END

                        <h2>Ingelogd.</h2>
                        <a href="paginaoverzicht.php?page=index.php"><button type="button" class="default">Paginaoverzicht</button></a>
                        <div class="berichten">
                            $str
                        </div>
                        <a href="logout.php"><button type="button" class="default">Logout</button></a>

                        END;
                    }
                ?>
                        
            </form>
        </div>
    </main>

</body>