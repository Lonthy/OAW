<?php
if (!isset($_POST['order']) || !isset($_POST['direction'])) {
    $sql = "SELECT * FROM `news` ORDER BY DATE DESC";
} else {
    $orderBy = $_POST['order'];
    $direction = $_POST['direction'];
    $sql = "SELECT * FROM `news` ORDER BY $orderBy $direction";
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
        ?>
        <br>
        <div style="padding-left: 20px; padding-right: 20px;">
            <div class="well" >
                <div class="item"> 
                    <h2><a href="<?php echo $Url; ?>"><?php echo $Title; ?></a></h2>
                    <p>Description: <?php echo $Description; ?></p>
                    <p>Category: <?php echo $Category; ?></p>
                    <p><small>Posted on <?php echo $Date; ?></small></p>
                    <p>From: <?php echo $Source; ?></p>
                </div>
            </div>
        </div>
        <?php
    }
}
?>



