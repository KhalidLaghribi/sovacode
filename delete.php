<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "clients";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Implement your SQL DELETE query here to delete the row from the database
    $sql = "DELETE FROM info_clients WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        // Redirect back to the page containing the table after the deletion is done
        $sql_update_ids = "UPDATE info_clients SET id = id - 1 WHERE id > $id";
        header("Location: respond_page.php");
        exit();
    } else {
        echo "error";
    }
} else {
    echo "erroe_parametre";
}
?>