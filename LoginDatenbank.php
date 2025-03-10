<?php
// Start the session: must be the first command
session_start();
?>
    <?php
    // PHP-Code: Auslesen der Parameter
    // Alle Variablen in PHP beginnen mit einem Dollarzeichen


    // Überprüfe ob die Parameter username und password übergeben wurden -->
    if (!isset($_REQUEST['username']) || !isset($_REQUEST['password'])) {
        // $_SESSION: enthält die Session-Variablen:
        // Diese existieren  für die Dauer der Session: 
        // Bis die Session beendet wird oder der Browser geschlossen wird. 
        $_SESSION['err']="Login: Username or password is empty";
        header("Location: error.php");
        exit();
    }

    // $_POST ist ein Array in PHP, das alle Parameter enthält, die per POST-Request übergeben wurden
    // $_GET ist ein Array in PHP, das alle Parameter enthält, die per GET-Request übergeben wurden
    // $_REQUEST ist ein Array in PHP, das alle Parameter enthält, die per POST- oder GET-Request übergeben wurden
    $user = $_REQUEST['username'];
    $password = $_REQUEST['password'];




    //Überprüfe ob die Parameter leer sind
    if (empty($user) || empty($password)) {
        echo "Bitte geben Sie eine E-Mail-Adresse ein!";
        exit;
    }


        // Verbindung zur Datenbank herstellen
        //              Servername, Benutzername, Passwort, Datenbankname
        $connection = new mysqli('localhost', 'root', '', 'LoginFussballWebsite');
        // Überprüfen ob die Verbindung erfolgreich war
        if ($connection->connect_error) {
            $_SESSION['err']=$conn->connect_error;
            header("Location: error.php");
            exit(); 
        }
    

        // SQL-Query: prepare() bereitet das Statement vor. Vorsicht WEGEN SQL-INJEKTION
        //             ? sind Platzhalter für die Parameter
        $sql="SELECT username, password FROM users WHERE username = ? AND password = ?";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $user, $password);
        $stmt->execute();
        if ($stmt->error) {
            $_SESSION['err']= $stmt->error;
            header("Location: error.php");
            $conn->close();
            exit(); 
        }  
    
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Save the username in the session
            $_SESSION['username']=$user;
            header("Location: Fußballspieler .php");
        } else {
            $_SESSION['err']="Login failed";
            header("Location: LoginSeitehtml.php");
        }

        $stmt->close();
        $conn->close();

        ?>
