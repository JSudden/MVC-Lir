<?php
    require_once APPROOT . "\\views\includes\header.php";   
?>
<h1>POsts bitches</h1>
<?php foreach($data['blogposts'] as $blogpost) : ?>
</h3><?php echo $blogpost->title; ?></h3>
<?php endforeach; ?>
<?php
    require_once APPROOT . "\\views\includes\\footer.php";
?>