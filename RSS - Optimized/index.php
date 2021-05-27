<!DOCTYPE html>
<?php include './includes/sqlConnect.php'; ?><html lang=en><meta name="description" content="Homepage."><meta charset=UTF-8><title>RSS Newsfeed</title><meta content="width=device-width,initial-scale=1"name=viewport><link href=https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css rel=stylesheet><link href=stylesheet.css rel=stylesheet><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js></script><body id=index><nav class="navbar navbar-inverse"><div class=container-fluid><div class=navbar-header><a class=navbar-brand>My RSS feed</a></div><ul class="nav navbar-nav"><li class=active><a href=#>Home</a><li><a href=manageLinks.php>Manage RSS links</a></ul><script src=validateSearch.js></script><form action=search.php method=post class="navbar-form navbar-left"name=searchnews onsubmit="return validateSearch()"><input name=searched class=form-control placeholder="Search news"> <button class="btn btn-default"type=submit>Search</button></form></div></nav><div class=set><div class=row><div class=col-lg-4><div class=well><h3>Click to get up to date news</h3><form action=updateFeed.php method=post><input type=submit value="Update feed"></form></div></div><form action=index.php method=post><div class=col-lg-4><div class=well><p>Order by</p><input type=radio value=Date id=Date name=order<?php if((isset($_POST['order'])) && (($_POST['order'])=='Date')){echo 'checked="checked"';}?>> <label for=Date>Date</label><br><input type=radio value=Title id=Title name=order<?php if((isset($_POST['order'])) && (($_POST['order'])=='Title')){echo 'checked="checked"';}?>> <label for=Title>Title</label><br><input type=radio value=Source id=Source name=order<?php if((isset($_POST['order'])) && (($_POST['order'])=='Source')){echo 'checked="checked"';}?>> <label for=Source>Source</label></div></div><div class=col-lg-4><div class=well><p>What direction</p><input type=radio value=ASC id=ASC name=direction<?php if((isset($_POST['direction'])) && (($_POST['direction'])=='ASC')){echo 'checked="checked"';}?>> <label for=ASC>Ascending</label><br><input type=radio value=DESC id=DESC name=direction<?php if((isset($_POST['direction'])) && (($_POST['direction'])=='DESC')){echo 'checked="checked"';}?>> <label for=DESC>Descending</label><br><input type=submit value=Accept></div></div></form></div></div><?php
            
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
                include './includes/RSS_feed.php';
            } else {
                include './includes/noLinks.php';
            }
            ?>