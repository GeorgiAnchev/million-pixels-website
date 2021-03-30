<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style type="text/css">
    form {
        padding-left: 30px;
        padding-top: 10px;
        width: 400px;
    }
</style>
<form method= "post" action="register_handler.php" class="form-group">
    <div >
        <label for="username" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
        <input type="text" class="form-control form-control-sm" name="username" required>
        <label for="password" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
        <input type="password" class="form-control form-control-sm" name="password" required>
        <label for="fn" class="col-sm-2 col-form-label col-form-label-sm">Faculty&nbspnumber</label>
        <input type="number" class="form-control form-control-sm" name="fn" required>
    </div>
    <div class="form-group">
        </br>
        <button class="btn btn-primary form-control-sm" type="submit" name = "login">Register</button>
    </div>
</form>