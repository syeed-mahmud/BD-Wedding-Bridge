<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News Layout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.30.0/dist/full.css" rel="stylesheet">
  <style>
    .news-card img {
      height: 500px;
      width: 100%;
      object-fit: cover;
      border-radius: 20px 20px;
    }
    .news-content {
      background-color: #36C2A8;
      border-radius: 20px 0 0 20px;
      padding: 20px;
      color: black;
    }
    .news-content2 {
      background-color: #36C2A8;
      border-radius: 0 20px 20px 0;
      padding: 20px;
      color: black;
    }
    .news-row {
      display: flex;
      align-items: stretch;
      margin-bottom: 1rem; /* Optional, adjust as needed */
    }
    .news-item {
      padding: 0;
    }
  </style>
</head>
<?php
include("header.php")
?>
<body>

<div class="container mt-5" id="news-container">
  <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wedding_bridge";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM news";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $contentClass = ($i % 2 === 0) ? 'news-content' : 'news-content2';
            echo '<div class="row news-row mb-4">';
            
            if ($i % 2 === 0) {
                echo '<div class="col-md-6 news-item">
                        <div class="' . $contentClass . ' d-flex flex-column justify-content-between mt-5" style="height: 410px;">
                            <div>
                                <h2 class="text-2xl font-bold">' . $row["news_title"] . '</h2>
                                <h2 class="text-2xl font-bold mb-5">' . $row["news_link"] . '</h2>
                                <p>' . $row["news_content"] . '</p>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-6 news-item">
                        <div class="news-card">
                          <img src="' . $row["news_img"] . '" alt="' . $row["news_title"] . ' image">
                        </div>
                      </div>';
            } else {
                echo '<div class="col-md-6 news-item">
                        <div class="news-card">
                          <img src="' . $row["news_img"] . '" alt="' . $row["news_title"] . ' image">
                        </div>
                      </div>
                      <div class="col-md-6 news-item">
                        <div class="' . $contentClass . ' d-flex flex-column justify-content-between mt-5" style="height: 410px;">
                            <div>
                                <h2 class="text-2xl font-bold">' . $row["news_title"] . '</h2>
                                <h2 class="text-2xl font-bold mb-5">' . $row["news_link"] . '</h2>
                                <p>' . $row["news_content"] . '</p>
                            </div>
                        </div>
                      </div>';
            }

            echo '</div>';
            $i++;
        }
    } else {
        echo "0 results";
    }

    $conn->close();
  ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
include("footer.php")
?>
</html>
