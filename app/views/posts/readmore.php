<?php
    require_once APPROOT . "\\views\includes\header.php"; 
      
?>

<h1>Här kan du läsa mer om helvetet</h1>

    <h3><?php echo $data['post']->title; ?></h3>
    <p><?php echo $data['post']->content; ?></P>
    <h2> Kommentera här plox</h2>
    
    <form action="<?PHP echo URLROOT2 . "comments/add" ?>" method="post">
  <div class="form-row">
    <div class="col-md-5">
    <input type="hidden" name="blogpost" value="<?php echo $data['post']->id; ?>"/>
      <input type="text" name="name" class="form-control" placeholder="Title">
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
<?php foreach($data['comments'] as $comment) : ?>
<h3><?php echo $comment->name; ?></h3>
<p><?php echo $comment->content; ?></P>
<?php endforeach; ?>
<?php
    require_once APPROOT . "\\views\includes\\footer.php";
?>