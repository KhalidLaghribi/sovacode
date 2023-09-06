<!DOCTYPE html>
<html lang="en" class=" bg-dark_blue   h-full bg-no-repeat overflow-x-hidden ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../dist/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <link rel="icon" href="../images/logo/Group 162475.svg" type="image/icon type">
</head>
<body>

<?php
session_start();


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

$sql = "SELECT Name ,email, topic, messages , id FROM info_clients ORDER BY id DESC";
$result = $conn->query($sql);

// Create an array to hold the results
$userData = array();

// Fetch data and store it in the array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userData[] = array(
            'email' => $row['email'],
            'topic' => $row['topic'],
            'messages' => $row['messages'],
            'id'=> $row['id'],
            'Name' => $row['Name']
        );
    }
}
else{
    $sql_reset_auto_increment = "ALTER TABLE info_clients AUTO_INCREMENT = 1";
    $result_reset_auto_increment = $conn->query($sql_reset_auto_increment);
}


 if (isset($_SESSION["check"])) {
    echo '<script type="text/javascript">
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr["success"]("message send successfully")
    </script>';
  
    unset($_SESSION["check"]);
  }
  
?>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   email
                </th>
                <th scope="col" class="px-6 py-3">
                   name
                </th>
                <th scope="col" class="px-6 py-3">
                    topic
                </th>
                <th scope="col" class="px-6 py-3">
                    message
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">repond</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">delete</span>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($userData as  $user): ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $user['email']; ?>  
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $user['Name']; ?>  
                </th>
                <td class="px-6 py-4">
                <?php echo $user['topic']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $user['messages']; ?>
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="send_msg.php?id=<?php echo $user['id']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">respond</a>
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="delete.php?id=<?php echo $user['id'] ?>"  class="delete-btn font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script src="../node_modules/preline/dist/preline.js" type="text/javascript"></script>
<script src="../node_modules/flowbite/dist/flowbite.min.js" type="text/javascript"></script>
</body>
</html>