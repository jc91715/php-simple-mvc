<?php view('common/header',compact('title'));?>

<div class="container">

    <h1 class="text-center"><?php echo $post->title;?></h1>

    <pre>
        <?php echo $post->content_html;?>
    </pre>
</div>
<?php view('common/footer');?>