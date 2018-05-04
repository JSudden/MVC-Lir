<?php
    require_once APPROOT . "\\views\includes\header.php"; 
      $CAdmin = new Admins;
    
?>

<h1>Admin prooo</h1>
<?php foreach($data['blogposts'] as $blogpost) : ?>
<h2><?php echo $blogpost->title; ?></h2>
<p><?php echo $blogpost->content; ?></P>
<a href="<?php echo URLROOT6; ?><?php echo $blogpost->id;?>" class="delete" >Delete</a>
<?php endforeach; ?>

<?php

    require_once APPROOT . "\\views\includes\\footer.php";
?>