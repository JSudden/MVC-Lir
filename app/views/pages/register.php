<?php
    require_once APPROOT . "\\views\includes\header.php";   
?>
<h1><?php echo $data['title'] ?></h1>
<form action="<?PHP echo URLROOT2 . "users/add" ?>" method="post">
  <div class="form-row">
    <div class="col-md-5">
      <input type="text" name="username" class="form-control" placeholder="Username">
      <input type="text" name="password" class="form-control" placeholder="Password">
    </div>
</div>
    <div class="row">
        <div class="col-md-12"> 
            <input class="btn btn-primary mg-10" type="submit" name="send" value="Register"/>
        </div>
    </div>
  </div>
</form>

<?php
    require_once APPROOT . "\\views\includes\\footer.php";
?>