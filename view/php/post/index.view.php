<?php view('common/header',compact('title'));?>

<div class="container">

    <h1 class="text-center">文章列表</h1>
    <div class="row">
        <?php foreach ($posts as $post){ ?>
            <div class="col-md-4">
                <a href="/post/show/<?php echo $post->id;?>"><?php echo $post->title;?></a>
                <div style="height: 30px"></div>
            </div>
        <?php } ?>
    </div>
</div>

<?php view('common/footer');?>