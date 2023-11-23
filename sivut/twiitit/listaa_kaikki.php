<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href=$KANTA_URL/config/init.php />
    <!-- Välilehden otsikko -->
    <title>Twitter-sivu</title>
    <meta charset="utf-8">
  </head>
  <body>
  
    <?php
      include_once ('C:\xampp\htdocs\tweets\config\init.php');
      include_once ('C:\xampp\htdocs\tweets\tietokanta/tweets.php');

      $tweets getAllTweets();

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

      try {
        // Query to get all tweets
        $query = "SELECT * FROM twiitit";
  
        // Prepare and execute the query
        $stmt = $pdo->prepare($query);
        $stmt->execute();
  
        // Fetch all tweets
        $tweets = $stmt->fetchAll();
  
        // Output the tweets
        foreach ($tweets as $tweet) {
            // Display tweet information
            echo "<article class='tweet'>";
            echo "<header>";
            echo "<span class='oikeanimi'>" . $tweet['oikeanimi'] . "</span>";
            echo "<a href='#' class='kayttajanimi'>@" . $tweet['kayttajanimi'] . "</a>";
            echo "<span class='time'>" . $tweet['time'] . "</span>";
            echo "</header>";
            echo "<p>" . $tweet['tekstit'] . "</p>";
            echo "</article>";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    ?>

    <?php foreach ($tweets as $tweet) { ?>
    <article class="tweet">
    <header>
    <span class="oikeanimi"><?=$tweet['oikeanimi']?></span>
    <a href="#" class="kayttajanimi">@<?=$tweet['kayttajanimi ']?></a>
    <span class="time"><?=$tweet['time']?></span>
    </header>

    <p><?=$tweet['text']?></p>
    </article>
    <?php } ?>

    <!-- Otsikko -->
    <section id="tweets">

      <header>
        <h2>Twiitit</h2>
      </header>
      <!-- Käyttäjän tiedot -->
      <article class="tweet">
        <header>
          <span class="oikeanimi">Jouni</span>
          <a href="#" class="kayttajanimi">@john</a>
          <span class="time">12:46 PM</span>
        </header>

        <!-- Teksti -->
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
      </article>

    </section>
  </body>
</html>
