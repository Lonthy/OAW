<?php
$search = $_POST['searched'];
if (!isset($_POST['order']) || !isset($_POST['direction'])) {
    $sql = "SELECT * FROM `news` WHERE `Title` LIKE '%$search%' ORDER BY DATE DESC";
} else {
    $orderBy = $_POST['order'];
    $direction = $_POST['direction'];
    $sql = "SELECT * FROM `news` WHERE `Title` LIKE '%$search%' ORDER BY $orderBy $direction";
}

$results = mysqli_query($conn, $sql);

if ($results != null) {
    while ($rowitem = mysqli_fetch_array($results)) {
        $Url = $rowitem['Url'];
        $Title = $rowitem['Title'];
        $Description = $rowitem['Description'];
        $Date = $rowitem['Date'];
        $Source = $rowitem['Source'];
        $Category = $rowitem['Category'];
        $ImgURL = $rowitem['ImgURL'];
        ?><br><div class=news><div class=well><div class=item><h2><a href="<?php echo $Url; ?>"><?php echo $Title; ?></a></h2><p>Description:<?php echo $Description; ?><p>Category:<?php echo $Category; ?><p><small>Posted on<?php echo $Date; ?></small><p>From:<?php echo $Source; ?><p><?php echo '<img src="' . $ImgURL . '" />'?>;</div></div></div><?php
    }
}
?>