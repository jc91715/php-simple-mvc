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
    <ul class="pagination">

    <li class="prev"><a href="/post/posts?page=<?php if($currPage==1){echo$currPage=1;}
                                            else{
                                                echo $currPage-1;
                                            }

                                            ?>">&laquo;</a></li>

    <?php for ($i=1;$i<$pageAll+1;$i++ ){ ?>
        <li class="ac"><a href="/post/posts?page=<?php echo $i;?>"><?php echo $i;?></a></li>

<?php }?>
    <li class="next"><a href="/post/posts?page=<?php if($currPage==$pageAll)
                                        {echo $currPage=$pageAll;}
                                        else{
                                            echo $currPage+1;
                                        }
                                        ?>">&raquo;</a></li>
    </ul>


</div>
<?php view('common/js');?>
    <script>
        $('.pagination li a').each(function () {
            if($(this).attr('href')==window.location.pathname+window.location.search){
                $(this).parent(':not(".next,.prev")').addClass('active')
            }
        })
    </script>
<?php view('common/footer');?>