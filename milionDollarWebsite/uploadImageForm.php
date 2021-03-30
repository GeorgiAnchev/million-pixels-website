<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style type="text/css">
    form {
        padding-left: 30px;
        padding-top: 10px;
        width: 300px;
    }
</style>
<form method= "post" action="uploadImage.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="row" class="col-sm-2 col-form-label col-form-label-sm">Row</label>
        <input type="number" class="form-control form-control-sm" name="row" required>
    </div>
    <div class="form-group">
        <label for="row" class="col-sm-2 col-form-label col-form-label-sm">Height</label>
        <input type="number" class="form-control form-control-sm" name="height" required>
    </div>
    <div class="form-group">
        <label for="row" class="col-sm-2 col-form-label col-form-label-sm">Col</label>
        <input type="number" class="form-control form-control-sm" name="col" required>
    </div>
    <div class="form-group">
        <label for="row" class="col-sm-2 col-form-label col-form-label-sm">Width</label>
        <input type="number" class="form-control form-control-sm" name="width" required>
    </div>
    <div class="form-group">
        <label for="row" class="col-sm-2 col-form-label col-form-label-sm">Url</label>
        <input type="text" class="form-control form-control-sm" name="url" required>
    </div>
    <div class="form-group">
        <label for="row" class="col-sm-2 col-form-label col-form-label-sm">Caption</label>
        <input type="text" class="form-control form-control-sm" name="caption" required>
    </div>
    <div class="form-group">
        <label for="row" class="col-sm-2 col-form-label col-form-label-sm">Image</label>
        <input type="file" class="form-control form-control-sm" name="image" required>
    </div>
    </br>
    <div class="form-group">
        <input type="submit" class="btn btn-primary form-control-sm">
    </div>
</form>