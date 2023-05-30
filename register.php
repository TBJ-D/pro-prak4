

<body>
    <?php 
        include_once("header.php");
        if (isset($_GET['code'])) {
            $message;
            switch($_GET['code']){
                case 2:
                    $message = "Passwords do not match.";   
                break;
                case 3:
                    $message = "Invalid email";
                break;
            }
            echo "<script> alert('$message'); </script>";
        }
    ?> 
    <main id="register">
        <div class="form-container form-background">
            <form method="post" action="register_backend.php">
                <h1>Registreer</h1>
                <label for="email">Email</label>
                <input name="email" type="text" id="email" placeholder="Email" required>
                <label for="password">Password</label>
                <input name="password" type="password" id="password" placeholder="Password" required>
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" id="confirmpassword" placeholder="Confirm Password" required>
                <div id="buttons">
                <button action="submit" class="default">Registreer</button>
                <a href="login.php"><button type="button" class="default">Login</button></a>
                </div>
            </form>
        </div>
    </main>

</body>