<!DOCTYPE html>
<html lang="en" class=" bg-dark_blue   h-full bg-no-repeat overflow-x-hidden ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../dist/output.css">

</head>
<body>
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

    $sql = "SELECT email, id FROM info_clients WHERE id=$id";
    $result = $conn->query($sql);

    
    // Fetch data and store it in the array
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); 
    }

} else {
    echo "error data not found";
}



?>


<form action="to_gmail.php" method="post">
  <div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-white">to:</label>
    <input name="email" value="<?php echo $user['email']; ?>" type="text" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-not-allowed" >
  </div>
  
<div class="mb-6">
<label for="message" class="block mb-2 text-sm font-medium text-white">Your message</label>
<textarea id="message" name=message rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
</div>

<button type="submit" name="send" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">send message</button>

</form>


<script src="../node_modules/preline/dist/preline.js" type="text/javascript"></script>
<script src="../node_modules/flowbite/dist/flowbite.min.js" type="text/javascript"></script>
</body>
</html>