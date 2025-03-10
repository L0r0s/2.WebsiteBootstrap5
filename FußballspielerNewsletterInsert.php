<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // PHP-Code: Auslesen der Parameter
    // Alle Variablen in PHP beginnen mit einem Dollarzeichen


    // Überprüfe ob die Parameter username und password übergeben wurden -->
    if (!isset($_REQUEST['email'])) {
        echo "Bitte geben Sie eine E-Mail-Adresse ein!";
        exit;
    } 


    // $_POST ist ein Array in PHP, das alle Parameter enthält, die per POST-Request übergeben wurden
    // $_GET ist ein Array in PHP, das alle Parameter enthält, die per GET-Request übergeben wurden
    // $_REQUEST ist ein Array in PHP, das alle Parameter enthält, die per POST- oder GET-Request übergeben wurden
    $user = $_REQUEST['email'];



    //Überprüfe ob die Parameter leer sind
    if (empty($user)) {
        echo "Bitte geben Sie eine E-Mail-Adresse ein!";
        exit;
    }


        // Verbindung zur Datenbank herstellen
        //              Servername, Benutzername, Passwort, Datenbankname
        $connection = new mysqli('localhost', 'root', '', 'Fussballspielernewsletter');
        // Überprüfen ob die Verbindung erfolgreich war
        if ($connection->connect_error) {
            // . ist der Concat Operator in PHP, wie das + in Java
            die("Verbindung zur Datenbank fehlgeschlagen: " . $connection->connect_error);
        }

        // SQL-Query: prepare() bereitet das Statement vor. Vorsicht WEGEN SQL-INJEKTION
        //             ? sind Platzhalter für die Parameter
        $sql="insert into Newsletter (email) values (?)";
        $stmt = $connection->prepare($sql);
        // bind_param() bindet die Parameter an die Platzhalter (Fragezeichen)
        // Datentypen: s = string, i = integer, d = double, b = blob
        $stmt->bind_param("s", $user); //ss = string, string
        // execute() führt das Statement aus
        $stmt->execute();

        //check the success of the query
        if ($stmt->affected_rows == 1){
            header("Location: Fußballspieler .html");
        } else{
            header("Location: Fußballspieler .html");
        }
        // get the ID of the last inserted user
        $id = $stmt->insert_id;

        //Schließe das Statement und die Datenbankverbindung
        $stmt->close();
        $connection->close();
        //Alles was wir mit echo ausgeben kommt in die Antwort des Servers
        echo"";
        echo "Erfolgreich eingefügt! <br>";
        echo "ID: $id <br>";
        echo "EMAIL: $user <br>";
        ?>

</body>
</html>