
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style type="text/css">
    img{
        position: absolute;
    }
    .imgLink {
        position: relative;
        display:block;
    }
    .imgLink > a {
        display:inherit;
    }
    #container {
        left: 50px;
        top: 50px;
        position: absolute;
        border-style: solid;
        border-width: 1px;
        width: 1000px;
        height: 1000px;
    }
    .btn {
        margin: 5px;
    }

</style>

<?php
session_start();
if (isset($_SESSION['valid']) && $_SESSION['valid'] == true ) 
{
    $username = $_SESSION['username'];
    echo "Hello, " . $username;
    echo '<a class="btn btn-primary" href="uploadImageForm.php">Upload image</a>';
    echo '<a class="btn btn-primary" href="logout.php">Logout</a>';

    if($_SESSION['is_admin'] == true)
    {
        echo '<a class="btn btn-primary" href="reviewRequests.php">Review requests</a>';
        echo '<a class="btn btn-primary" href="givePoints.php">Give points</a>';
    }
}else
{
    echo '<a class="btn btn-primary" href="registerForm.php">Register</a>
    <a class="btn btn-primary" href="loginForm.php">Login</a>';
}

$requestedDate = getTheDate();
datePicker($requestedDate);

include('dbconnection.php');

$query_select = "SELECT * FROM requests WHERE is_accepted=1 AND placed_on <= '$requestedDate'";
$run_query = mysqli_query($connection, $query_select);
echo "<div id='container'>";

while($result = mysqli_fetch_assoc($run_query))
{   
    getImage($result['img_path'], $result['caption'], $result['url'], $result['row'], $result['col'], $result['width'], $result['height'] );
}

echo "</div>";

mysqli_close($connection);

function getImage($path, $caption, $url, $top, $left, $width, $height) {
    echo "<img src='$path' alt='$caption' style='left: $left; top:$top' usemap='#workmap' onclick=imgClick(this) data-url='$url'  title='$caption'>";
}

function getTheDate(){
    if(isset($_GET['lastDate'])){
        return $_GET['lastDate'];
    }
    else
    {
        return date('Y-m-d');
    }
}

function datePicker($dateToShow){
    
    //$today = date('Y-m-d');
    echo "<label for='lastDate'>Up to date:</label>
    <input class='datepicker' type='date' id='lastDate' value='$dateToShow' onchange='dateHandler(event);'>";
}

?>

<script type="text/JavaScript">   
function imgClick(elm){
    var url = elm.dataset.url;
    if(!url.startsWith('http')){url = 'https://' + url}
    var win = window.open(url, '_blank');
    win.focus();
}
    
function dateHandler(e){
    var date = e.target.value;
    var page = "index.php?lastDate=" + date;
    //console.log(page);
    window.location.href = page;
}    
</script> 