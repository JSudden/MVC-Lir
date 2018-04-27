<?php
    require_once APPROOT . "\\views\includes\header.php";   
?>
<h1>MVC ÄR SKROT</h1>
<h1>Gör ett inlägg</h1>
<!-- formulär för vad ditt inlägg ska innehålla --> 
<form action="<?PHP URLROOT2 . "posts/add" ?>" method="post">
  <div class="form-row">
    <div class="col-md-5">
      <input type="text" name="title" class="form-control" placeholder="Title">
      <input type="text" name="content" class="form-control" placeholder="Content">
    </div>
</div>
    <div class="row">
        <div class="col-md-12"> 
            <input class="btn btn-primary mg-10" type="submit" name="send" value="Send"/>
        </div>
    </div>
  </div>
</form>

<?php
    require_once APPROOT . "\\views\includes\\footer.php";
?>