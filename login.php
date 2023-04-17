

<body>
    <?php 
        include_once("header.php");
    ?> 
    <main id="register">
        <div class="form-container form-background">
            <form method="post" action="login_backend.php">
                <?php 
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
                        echo <<<END
                        <a href="logout.php"><button type="button">Logout</button></a>

                        END;
                    }
                ?>
                        
            </form>
        </div>
    </main>

</body>