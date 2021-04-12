<!DOCTYPE html>
<?php include './includes/sqlConnect.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>

    </head>
    <body style="background-color: #333333">

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">My RSS feed</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="#">Manage RSS links</a></li>
                </ul>
                <form class="navbar-form navbar-left" action="search.php" method="post">
                    <input type="text" name="searched" class="form-control" placeholder="Search news">

                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
        </nav>
        <div style="padding: 20px">
            <div class="well" style="padding: 10px">
                <h3>Agrega links RSS:</h3>
                <form action="addLink.php" method="post">
                    <label for="fname">Source name</label><br>
                    <input type="text" id="sName" name="sName"><br>
                    <label for="lname">RSS url</label><br>
                    <input type="text" id="sUrl" name="sUrl"><br><br>
                    <input type="submit" value="Accept">
                </form> 
            </div>

            <?php
            $sql = "SELECT `ID_name`,`RSS_url` FROM `rss_links`";
            $results = mysqli_query($conn, $sql);

            if ($results != null) {
                echo "<div class='well'><table>";
                echo '<tr>
                            <th>Source name</th>
                            <th>RSS url</th>
                          </tr>';
                while ($rowitem = mysqli_fetch_array($results)) {
                    echo "<tr>";
                    echo "<td>" . $rowitem['ID_name'] . "</td>";
                    echo "<td>" . $rowitem['RSS_url'] . "</td>";
                    echo "</tr>";
                }
                echo "</table></div>";
            }
            ?>
            <div class="well" style="padding: 10px">
                <h3>Elimina links RSS:</h3>
                <form action="removeLink.php" method="post">
                    <label for="fname">Source name</label><br>
                    <input type="text" id="sName" name="sName"><br><br>
                    <input type="submit" value="Accept">
                </form> 
            </div>
        </div>

    </body>
</html>