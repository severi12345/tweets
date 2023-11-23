<?php

function getAllTweets() {
  global $conn;

  $query = "SELECT * FROM twiitit";
  $result = mysqli_query($conn, $query);

  if (!$result) {
      die("Tietokantakysely epäonnistui: " . mysqli_error($conn));
  }

  $tweets = array();

  while ($row = mysqli_fetch_assoc($result)) {
      $tweets[] = $row;
  }

  return $tweets;
}

mysqli_close($conn);

?>