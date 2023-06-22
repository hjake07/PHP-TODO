<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <span class="navbar-brand mb-0 h1">Utah Lake</span>
</nav>
<div class="container">
  <div class="row">
    <!-- <div class="parent"> -->
    <!-- <div class="container"> -->

        <?php
        $host = 'localhost';
        $port = 5432;
        $dbname = 'FISH_APP';
        $user = 'postgres';
        $password = 'postgres';
        $query = "SELECT * FROM utah_lake_fish";
        $connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
        if (!$connection) {
            echo "Failed to connect to the database.";
            exit;
        }
        
        $result = pg_query($connection, $query);
        if (!$result) {
            echo "Error executing the query.";
            exit;
        }
        while ($row = pg_fetch_assoc($result)) {
          $fishName = $row['fish'];
          $image = $row['image'];
          $strategy = null;
          $season = null;
          if(date('M') === "Mar" || date('M') === "Apr" || date('M') === "May"){
            $strategy = $row['strategy1'];
            $season = "Spring";
          }
          elseif(date('M') === "Jun" || date('M') === "Jul" || date('M') === "Aug"){
            $strategy = $row['strategy2'];
            $season = "Summer";
          }
          else $strategy = 'error: error';
          ?>




        <?php

          $tip = explode(":", $strategy)[0];
          $lures = explode(":", $strategy)[1];
          $lureslist = explode(',', $lures);
          echo "<div class=\"card col-sm\" style=\"width: 18rem;\">
              <img class=\"card-img-top\" src=\"$image.jpg\" alt=\"Card image cap\">
              <div class=\"card-body\">
                  <h5 class=\"card-title\">$fishName</h5>
                  <div class=\"hidden\" id=\"lure_$fishName\">
                  <p class=\"card-text\">$tip</p>";
                  
          if (is_array($lureslist)) {
              echo "<h6>Lures/Bait</h6><ul>";
              foreach ($lureslist as $lure) {
                  echo "<li>$lure</li>";
              }
              echo "</ul></div>";
          }
          
          echo "<button onclick=\"toggleShown('lure_$fishName')\" class=\"btn btn-primary card-button\">Tips</button>
              </div>
          </div>";
          
          // echo "<img src=\"$image.jpg\" class=\"fishimg\"><h1>$fishName</h1><h3>$season Tip</h3><p>$tip</p>";
          // echo "<h3>$season Lures/bait</h3>";
          // foreach($lureslist as $lure){
          //   echo "<li>$lure</li>"; 
          // }
          // ;
          
        };
        ?>
        </div>
</div>

<div id="api">

</div>
    <!-- </div> -->
    <!-- </div> -->
    <script src="script.js"></script>
</body>
</html>