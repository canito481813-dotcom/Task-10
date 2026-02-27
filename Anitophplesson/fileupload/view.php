<?php
include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Files</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<?php
$sql = "SELECT * FROM uploads";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    echo '<div class="card">';
    
    echo '<div class="title">Picture</div>';
    echo "<h3>".$row['filename']."</h3>";

    if($row['filetype'] == "application/pdf"){
        echo '<iframe src="data:application/pdf;base64,'
        .base64_encode($row['filedata']).'"
        width="500" height="300"></iframe>';
    }
    else{
        echo '<img src="data:'.$row['filetype'].';base64,'
        .base64_encode($row['filedata']).'" width="300">';
    }

    echo '</div>';
}
?>

</div>

</body>
</html>