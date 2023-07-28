<!DOCTYPE html>
<html lang="en" class=" bg-dark_blue   h-full bg-no-repeat overflow-x-hidden ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/output.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://localhost/filetail/src/contact.js"></script>

</head>
<body>
    
<?php
$email = '';
$topic = '';
$message = '';
$id = 0;
$send = 0;

function send_mess()
{
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

    global $email, $topic, $message, $send;

    if (isset($_POST['add'])) {
        // Validate and sanitize the input data
        $email = test_input($_POST['email']);
        $topic = test_input($_POST['topic']);
        $message = test_input($_POST['message']);

        // Perform form validation
        if (empty($email) || empty($topic) || empty($message)) {
            echo "Please fill in all the required fields.";
            $conn->close();
            return;
        }

        // Insert data into the database using prepared statements
        $sql = "INSERT INTO info_clients (email, topic, messages) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Check if the prepared statement was successful
        if (!$stmt) {
            echo "Error: " . $conn->error;
            $conn->close();
            return;
        }

        // Bind parameters to the prepared statement
        $stmt->bind_param("sss", $email, $topic, $message);

        if ($stmt->execute()) {
            // Message sent successfully
            $send+=1;
            $stmt->close();
            $conn->close();
            header("Location: contact.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
            $stmt->close();
            $conn->close();
            return;
        }
      
    }

    $conn->close();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Call the send_mess() function when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    send_mess();
}
if($send){
  echo "<script>alert('tawcha')</script>";
  $send-=1;
}
?>




<section class="bg-transparent dark:bg-gray-900">
  <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-white">Contact Us</h2>
      <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.</p>
      <form  method="post" class="space-y-8">
          <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
              <input type="email" id="email" name="email" value="<?php echo $email;?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
          </div>
          <div>
              <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
              <input type="text" id="subject" name="topic" value="<?php echo $topic;?>" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
          </div>
          <div class="sm:col-span-2">
              <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
              <textarea id="message" rows="6" name="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
          </div>
          <button type="submit" name="add" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Send message</button>
      </form>
  </div>
</section>

<div id="toast_msg"  class="toast hidden  items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
  <svg class="w-5 h-5 text-blue-600 dark:text-blue-500 rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 17 8 2L9 1 1 19l8-2Zm0 0V9"/>
  </svg>
  <div class="pl-4 text-sm font-normal">Message sent successfully.</div>
</div>


<script src="http://localhost/filetail/node_modules/preline/dist/preline.js" type="text/javascript"></script>
<script src="http://localhost/filetail/node_modules/flowbite/dist/flowbite.min.js" type="text/javascript"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script> -->

</body>
</html>