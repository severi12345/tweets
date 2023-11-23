<?php
      // Tietokantaan yhdistämis tiedot
      $hostname = 'hostnimi';
      $dbname = 'tietokannan nimi';
      $username = 'käyttäjätunnus';
      $password = 'salasana';

      // Tietokantaan yhdistäminen
      try {
          $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          die("Error: " . $e->getMessage());
      }
    ?>
