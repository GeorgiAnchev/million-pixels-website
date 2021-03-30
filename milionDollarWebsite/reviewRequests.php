<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style type="text/css">
    .container {
        padding: 10px;
    }
    .btn{
        height: 15px;
    }
    td{
        padding: 5px;
    }
</style>
<?php

    include('dbconnection.php');

    $query_select = "SELECT username, requests.* FROM requests INNER JOIN users ON users.id = requests.user_id WHERE is_accepted IS NULL";
    $run_query = mysqli_query($connection, $query_select);
    
    if (mysqli_num_rows($run_query) == 0) 
    { 
        echo "No requests pending";
    } else { 
        echo "<table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Date requested</th>
        <th>Price</th>
        <th>Url</th>
        <th>Caption</th>
        <th>Image</th>
      </tr>
    </thead>
<tbody>";
        while($result = mysqli_fetch_assoc($run_query)){
            ?>

           <tr>
            <td><?php echo $result['username'] ?></td>
            <td><?php echo $result['placed_on'] ?></td>
            <td><?php echo $result['price'] ?></td>
            <td><?php getUrl($result['url']) ?></td>
            <td><?php echo $result['caption'] ?></td>
            <td><?php getImage($result['img_path']) ?></td>
            <td><?php getBtn($result['id'], "Accept", 1) ?></td>
            <td><?php getBtn($result['id'], "Reject", 0) ?></td>
          </tr>

            <?php 
        }
        echo "</tbody></table>";
    }

    mysqli_close($connection);
?>

<?php 
function getImage($path) {
    echo "<img src='$path' alt='Cannot show image'>";
}

function getUrl($url){
    if(substr($url, 0, 4 )!=="http"){$url = 'https://' . $url;}
    echo "<a href='$url' target='_blank'>$url</a>";
}

function getBtn($id, $text, $is_accepted){
    echo "<button class='btn btn-primary form-control-sm' id='$id' onClick='submitRequest(this, $is_accepted)'>$text</button>";
}
?>

<script type="text/JavaScript">
function submitRequest(btn,is_accepted){
    var id = btn.id; 
    console.log(id);
    
    var ajaxRequest = new XMLHttpRequest();
    
    var params = 'id=' + id + '&is_accepted=' + is_accepted;

    
    ajaxRequest.onreadystatechange = function(){
      if(ajaxRequest.readyState == 4){
        location.reload();
//          console.log(ajaxRequest.responseText);
      }
   }
   ajaxRequest.open("POST", "ajaxEndpoints/reviewRequestHandler.php" , true);
   ajaxRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
   ajaxRequest.send(params); 
}
</script>



