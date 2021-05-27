<!doctypehtml><?php include './includes/sqlConnect.php'; ?><meta charset=UTF-8><title></title><meta content="width=device-width,initial-scale=1"name=viewport><link href=https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css rel=stylesheet><link href=stylesheet.css rel=stylesheet><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js></script><body id=search><nav class="navbar navbar-inverse"><div class=container-fluid><div class=navbar-header><a class=navbar-brand>My RSS feed</a></div><ul class="nav navbar-nav"><li class=active><a href=index.php>Home</a><li><a href=manageLinks.php>Manage RSS links</a></ul><script src=validateSearch.js></script><form action=search.php method=post class="navbar-form navbar-left"name=searchnews onsubmit="return validateSearch()"><input name=searched class=form-control placeholder="Search news"> <button class="btn btn-default"type=submit>Search</button></form></div></nav><div class=set><div class=row><div class=col-lg-4><div class=well><h3>Click to get up to date news</h3><form action=updateFeed.php method=post><input value="Update feed"type=submit></form></div></div><form action=search.php method=post><input value="<?php echo $_POST['searched'];?>"name=searched hidden><div class=col-lg-4><div class=well><p>Order by</p><input value=Date type=radio id=Date name=order<?php if((isset($_POST['order'])) && (($_POST['order'])=='Date')){echo 'checked="checked"';}?>> <label for=Date>Date</label><br><input value=Title type=radio id=Title name=order<?php if((isset($_POST['order'])) && (($_POST['order'])=='Title')){echo 'checked="checked"';}?>> <label for=Title>Title</label><br><input value=Source type=radio id=Source name=order<?php if((isset($_POST['order'])) && (($_POST['order'])=='Source')){echo 'checked="checked"';}?>> <label for=Source>Source</label></div></div><div class=col-lg-4><div class=well><p>What direction</p><input value=ASC type=radio id=ASC name=direction<?php if((isset($_POST['direction'])) && (($_POST['direction'])=='ASC')){echo 'checked="checked"';}?>> <label for=ASC>Ascending</label><br><input value=DESC type=radio id=DESC name=direction<?php if((isset($_POST['direction'])) && (($_POST['direction'])=='DESC')){echo 'checked="checked"';}?>> <label for=DESC>Descending</label><br><input value=Accept type=submit></div></div></form></div></div><?php
            
            function rssLink($count, $conn) {
                $sql = "SELECT * FROM `rss_links`";
                $result = mysqli_query($conn, $sql);
                $rowcount = mysqli_num_rows($result);
                if ($rowcount >= $count) {
                    return true;
                } else {
                    return false;
                }
            }

            if (rssLink(1, $conn)) {
                include './includes/RSS_feed_search.php';
            } else {
                include './includes/noLinks.php';
            }
            ?>