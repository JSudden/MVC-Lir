<?php
    require_once APPROOT . "\\views\includes\header.php";   
?>
<h1>POsts bitches</h1>
<?php foreach($data['blogposts'] as $blogpost) : ?>
</h3><?php echo $blogpost->title; ?></h3>
<p><?php echo $blogpost->content; ?></P>
<a href="http://localhost/MVC-Lir/public/index.php?url=posts/readmore/<?php echo $blogpost->id?>">Read More</a>
<?php endforeach; ?>
<?php
    require_once APPROOT . "\\views\includes\\footer.php";
?>