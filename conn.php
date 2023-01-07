<?php
// $hostname=mysql1249.mysql.database.azure.com;
// $username=Vedant;
// $password=Nogja@2004;
// $ssl-mode=require;
    /*$serverName = "tcp:srtmu.database.windows.net,1433"; // update me
    $connectionOptions = array(
        "Database" => "Student_information", // update me
        "Uid" => "sqlDBlogin", // update me
        "PWD" => "t7ZrxB@DiJBDRy7" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    print_r($conn);*/
  /*  $tsql= "SELECT TOP 20 pc.Name as CategoryName, p.name as ProductName
         FROM [SalesLT].[ProductCategory] pc
         JOIN [SalesLT].[Product] p
         ON pc.productcategoryid = p.productcategoryid";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Reading data from table" . PHP_EOL);
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['CategoryName'] . " " . $row['ProductName'] . PHP_EOL);
    }
    sqlsrv_free_stmt($getResults);*/

    $conn = mysqli_init(); 
    mysqli_ssl_set($conn,NULL,NULL, "C:\Users\Vedant\Downloads\DigiCertGlobalRootCA.crt.pem", NULL, NULL); 
    mysqli_real_connect($conn, "mysql1249.mysql.database.azure.com", "Vedant", "Nogja@2004", "student", 3306, MYSQLI_CLIENT_SSL);
    // print_r($conn);

    // $sql = "CREATE TABLE MyGuests (
    //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     firstname VARCHAR(30) NOT NULL,
    //     lastname VARCHAR(30) NOT NULL,
    //     email VARCHAR(50),
    //     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    //     )";
        
    //     if (mysqli_query($con, $sql)) {
    //       echo "Table MyGuests created successfully";
    //     } else {
    //       echo "Error creating table: " . mysqli_error($con);
    //     }
    
//     $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
        mysqli_close($conn);
?>