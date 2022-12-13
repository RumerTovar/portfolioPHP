<?php

function dbConection($sql)
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "album";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $result = $conn->query($sql);
  $response = [];

  if (is_bool($result)) {

    return $response;
  }

  if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {
      array_push($response, $row);
    };

    return $response;
  } else {
    return $response = [];
  }
  $conn->close();
}
