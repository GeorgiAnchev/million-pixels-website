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
<table>
    <thead>
      <tr>
        <th>Username</th>
        <th>FN</th>
        <th>Admin</th>
        <th>Current points</th>
        <th>Set points</th>
      </tr>
    </thead>
<tbody>
<?php
    session_start();
    $your_id = $_SESSION['user_id'];
    
    include('dbconnection.php');

    $query_select = "SELECT id, username, fn, points, is_admin FROM users";
    $run_query = mysqli_query($connection, $query_select);
    while($result = mysqli_fetch_assoc($run_query)){
        ?>

       <tr>
            <td><?php echo $result['username'] ?></td>
            <td><?php echo $result['fn'] ?></td>
            <td><?php getIsAdmin( $result['is_admin'], $result['id'], $your_id) ?></td>
            <td><?php echo $result['points'] ?></td>
            <td><?php getPointsInput($result['points'], $result['id']) ?></td>
            <td><?php getButton($result['id']) ?></td>
            <td><?php getMsg($result['id']) ?></td>
      </tr>

        <?php 
    }

    mysqli_close($connection);
?>

</tbody>
</table>

<?php 
    function getIsAdmin($admin, $id, $your_id)
    {
        $checked = $admin ? " checked" : "";
        $disabled = $your_id == $id ? " disabled" : "";
        echo "<input type='checkbox' id='admin_$id' $checked $disabled> "; 
    }

    function getPointsInput($points, $id)
    {
        echo "<input type='number' value=$points id='new_points_$id' min=0 >";
    }

    function getButton($id)
    {
        echo "<button class='btn btn-primary form-control-sm' onClick='submitRequest(this)' id='$id'>Update</button>";
    }

    function getMsg($id)
    {
        echo "<span id='message_$id'></span>";
    }
?>

<script type="text/JavaScript">
function submitRequest(btn){
    var id = btn.id; 
    console.log(id);
    var points = document.getElementById('new_points_' + id).value;
    var is_admin = document.getElementById('admin_' + id).checked ? 1 : 0;
    
    var ajaxRequest = new XMLHttpRequest();
    
    var params = 'id=' + id + '&admin=' + is_admin + '&points=' + points;
    console.log(params);
    
    ajaxRequest.onreadystatechange = function(){
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('message_' + id);
         //ajaxDisplay.innerHTML = ajaxRequest.responseText;
        location.reload();
      }
   }
   ajaxRequest.open("POST", "ajaxEndpoints/givePointsHandler.php" , true);
   ajaxRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
   ajaxRequest.send(params); 
}
</script>

