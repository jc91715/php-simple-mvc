<?php view('common/header', compact('title')); ?>
    <div class="container">

        <ul class="nav nav-pills">
            <li role="presentation"><a href="/index/index">index</a></li>
            <li role="presentation"><a href="/index/create">create</a></li>
            <li role="presentation"><a href="/index/show">show</a></li>
        </ul>
        <div style="height: 50px;"></div>

        <div class="jumbotron">
            <h1 class="text-center"><?php echo $title;?></h1>
        </div>
    </div>
<?php w('index', $title) ?>
<?php view('common/footer'); ?>