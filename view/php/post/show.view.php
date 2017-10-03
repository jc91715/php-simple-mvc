<?php view('common/header',compact('title'));?>

<div class="container">

    <h1 class="text-center"><?php echo $post->title;?></h1>
    <pre style="border: none!important;">
        <?php echo $post->content;?>

    </pre>
</div>
<?php view('common/js');?>
<?php view('common/footer');?>