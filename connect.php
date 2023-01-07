<?php

$name = $_POST["name"];
$email = $_POST["email"];
$date = $_POST["date"];
$phone = $_POST["phone"];
$message = $_POST["message"];

$conn = mysqli_init();

mysqli_ssl_set($conn,NULL,NULL, "C:\Users\Vedant\Downloads\DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, "mysql1249.mysql.database.azure.com", "Vedant", "Nogja@2004", "appointment", 3306, MYSQLI_CLIENT_SSL);
// print_r($conn);
$sql = "DELETE FROM Patient";
if (mysqli_query($conn, $sql)) {
  // echo "all data in table deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
//create table

        // $sql = "CREATE TABLE Patient (
        // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        // patientname VARCHAR(30) NOT NULL,
        // email VARCHAR(50),
        // appointment_date VARCHAR(30) NOT NULL,
        // mobile BIGINT NOT NULL,
        // feedback_message VARCHAR(100) NOT NULL
        // )";
        
        // if ($conn->query($sql) === TRUE) {
        //   echo "Table MyGuests created successfully";
        // } else {
        //   echo "Error creating table: " . $conn->error;
        // }

        // if (mysqli_query($conn, $sql)) {
        //   echo "Table MyGuests created successfully";
        // } else {
        //   echo "Error creating table: " . mysqli_error($con);
        // }

//insert data

// $sql = "INSERT INTO Patient (patientname, email, appointment_date, mobile, feedback_message)
// VALUES ('abc', 'abc@gmail.com', '10/12/2022', '135435213', 'nothing')";

// if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }


$sql = "INSERT INTO Patient (patientname, email, appointment_date, mobile, feedback_message)
VALUES ('$name', '$email', '$date', '$phone', '$message')";

if (mysqli_query($conn, $sql)) {
  echo "<h1 style='color:#02d62d;text-align:center;'>Your Appointment has been successfully processed</h1> <br>";
  // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//delete all data in table

// $sql = "DELETE FROM Patient";
// if (mysqli_query($conn, $sql)) {
//   echo "all data in table deleted successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }


//select data

$sql = "SELECT patientname, email, appointment_date, mobile, feedback_message FROM Patient";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<br>" ."Name: " . $row["patientname"]. "<br>" . "email id : " . $row["email"]. "<br>". "Appointment date : " . $row["appointment_date"]. "<br>". "Mobile : " . $row["mobile"]. "<br>". "Feedback Mesaage : " . $row["feedback_message"]. "<br><a href='index.html'><button type='button'>Return to main page</button></a>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>