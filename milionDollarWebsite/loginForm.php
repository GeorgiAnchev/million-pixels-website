<?php
   ob_start();
   session_start();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style type="text/css">
    form {
        padding-left: 30px;
        padding-top: 10px;
        width: 300px;
    }
    .redError{
        color: red;
    }
</style>
<html lang = "en">
   <body>
      <div>
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
                include('dbconnection.php');
                $username = $_POST["username"];
                $password = $_POST["password"];
                $query = "SELECT `id`, `username`, `points`, `is_admin`, `fn`
                FROM users WHERE username='$username' AND password='$password' ";

                $run_query = mysqli_query($connection, $query);
                
                if(mysqli_num_rows($run_query)== 0){
                    $msg = 'Wrong username or password';
                }else{
                    $result = mysqli_fetch_array($run_query, MYSQLI_ASSOC);
                    
                    $_SESSION['valid'] = true;
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['points'] = $result['points'];
                    $_SESSION['is_admin'] = $result['is_admin'];
                    $_SESSION['fn'] = $result['fn'];
                    
                    header("Location: http://localhost:9090/dashboard/working-files/milionDollarWebsite/index.php"); 
                    exit();
                }
                
                mysqli_close($connection);
            }
         ?>
      </div>
      
      <div class = "container">
         <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
            <div class='redError'><?php echo $msg; ?></div>
            <div class="form-group">
                <label for="username" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
                <input type="text" class="form-control form-control-sm" name="username" required>
                <label for="password" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
                <input type="password" class="form-control form-control-sm" name="password" required>
            </div>
            <div class="form-group">
                </br>
                <button class="btn btn-primary form-control-sm" type="submit" name = "login">Login</button>
            </div>
         </form>
      </div> 
   </body>
</html>