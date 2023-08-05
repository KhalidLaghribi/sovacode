<!DOCTYPE html>
<html lang="en" class=" bg-dark_blue   h-full bg-no-repeat overflow-x-hidden ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dist/output.css">

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

$sql = "SELECT email, topic, messages , id FROM info_clients ORDER BY id DESC";
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
            'id'=> $row['id']
        );
    }
}
else{
    $sql_reset_auto_increment = "ALTER TABLE info_clients AUTO_INCREMENT = 1";
    $result_reset_auto_increment = $conn->query($sql_reset_auto_increment);
}

?>






<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   email
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
        <?php foreach ($userData as $key => $user): ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $user['email']; ?>  
                </th>
                <td class="px-6 py-4">
                <?php echo $user['topic']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $user['messages']; ?>
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="mailto:<?php echo $user['email']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">respond</a>
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="delete.php?id=<?php echo $user['id'] ?>"  class="delete-btn font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>