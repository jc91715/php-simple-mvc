<?php view('common/header',compact('title'));?>
<div class="container">
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">文章标题</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="inputEmail3" placeholder="文章标题">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-md-2 control-label">文章内容</label>
            <div class="col-md-10">
                <textarea name="content" data-provide="markdown" rows="10" style="width: 100%" id="content"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">创建</button>
            </div>
        </div>
    </form>
</div>
<?php view('common/js');?>
<script src="https://cdn.bootcss.com/bootstrap-markdown/2.10.0/js/bootstrap-markdown.min.js"></script>
<script src="https://cdn.bootcss.com/showdown/1.7.4/showdown.min.js"></script>
<script>
    $("#content").markdown({autofocus:true,savable:false})
    var markdown = new showdown.Converter();
    markdown.toHTML = function(val) {
        return markdown.makeHtml(val);
    }

</script>
<?php view('common/footer');?>

