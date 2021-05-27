<!doctypehtml><?php include './includes/sqlConnect.php'; ?><meta charset=UTF-8><title></title><meta content="width=device-width,initial-scale=1"name=viewport><link href=https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css rel=stylesheet><link href=stylesheet.css rel=stylesheet><script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><body id=manage><nav class="navbar navbar-inverse"><div class=container-fluid><div class=navbar-header><a class=navbar-brand>My RSS feed</a></div><ul class="nav navbar-nav"><li><a href=index.php>Home</a><li class=active><a href=#>Manage RSS links</a></ul><script src=validateSearch.js></script><form action=search.php method=post name=searchnews onsubmit="return validateSearch()"class="navbar-form navbar-left"><input name=searched class=form-control placeholder="Search news"> <button class="btn btn-default"type=submit>Search</button></form></div></nav><div class=set><div class="links well"><h3>Agrega links RSS:</h3><script src=validateFeed.js></script><form action=addLink.php onsubmit="return validateFeedInsert()" method=post name=newfeed><label for=fname>Source name</label><br><input name=sName id=sName><br><label for=lname>RSS url</label><br><input name=sUrl id=sUrl><br><br><input type=submit value=Accept></form></div><?php
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
            ?><div class="links well"><h3>Elimina links RSS:</h3><form action=removeLink.php method=post name=delfeed onsubmit="return validateFeedDelete()"><label for=fname>Source name</label><br><input name=sName id=sName><br><br><input type=submit value=Accept></form></div></div>