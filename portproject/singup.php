
<?php 
if (isset($_POST["button"])) {
    $host = 'localhost';
    $user = 'safouane';
    $password = 'safphpmyadmi';
    $db = "s'inscrire";

    // Correct the function name
    $conn = mysqli_connect($host, $user, $password, $db);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $insert = "INSERT INTO informations_clients (nom , email, telephone, motdepass) 
               VALUES ('$name', '$email', '$phone', '$password')";

    // Execute the query
    $query = mysqli_query($conn, $insert);

    // Check if the query was successful
    if ($query) {
        echo "ok";
        // Optionally redirect to the thank you page
        header("Location: merci.html");
        exit();
    } else {
        echo "not ok: " ;
    }

    
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="singup.css"> 
</head>
<body>
    <!-- CTA to return to the home page -->
    <div class="cta-left">
        <a href="home.html" class="cta">Revenir</a>
    </div>
    <div class="container">
        <h1>S'inscrire</h1>
        <form method="POST" action="singup.php">
            <input type="text" name="name" placeholder="Nom Complet" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="phone" name="phone" placeholder="Téléphone" required><br>
            <input type="password" name="password" placeholder="Mot de passe" required><br>
            <input type="submit" value="S'inscrire" name="button">
        </form>
    </div>
</body>
</html>
