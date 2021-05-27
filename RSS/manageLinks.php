<!DOCTYPE html>
<?php include './includes/sqlConnect.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="managelinks.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="validateFeed.js"></script>
        <script src="validateSearch.js"></script>

    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">My RSS feed</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="#">Manage RSS links</a></li>
                </ul>
                <form name="searchnews" class="navbar-form navbar-left" action="search.php" onsubmit="return validateSearch()" method="post">
                    <input type="text" name="searched" class="form-control" placeholder="Search news">

                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
        </nav>
        <div class="set">
            <div class="well links">
                <h3>Agrega links RSS:</h3>
                <form name="newfeed" action="addLink.php" onsubmit="return validateFeedInsert()" method="post">
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
            <div class="well links">
                <h3>Elimina links RSS:</h3>
                <form name="delfeed" action="removeLink.php" onsubmit="return validateFeedDelete()" method="post">
                    <label for="fname">Source name</label><br>
                    <input type="text" id="sName" name="sName"><br><br>
                    <input type="submit" value="Accept">
                </form> 
            </div>
        </div>

    </body>
</html>