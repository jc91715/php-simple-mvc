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
    <?php echo $pagiHtml;?>


</div>
<?php view('common/js');?>
    <script>
        $('.pagination li a').each(function () {
            if($(this).attr('href')==window.location.pathname+window.location.search){
                $(this).parent(':not(".next,.prev")').addClass('active')
            }
        })
        if(window.location.pathname=='/post/posts' && window.location.search==""){
            $('.pagination li:nth-child(2)').addClass('active')
        }
    </script>
<?php view('common/footer');?>