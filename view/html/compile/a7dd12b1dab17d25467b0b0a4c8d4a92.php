<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <ul class="nav nav-pills">
        <li role="presentation"><a href="/index/index">index</a></li>
        <li role="presentation"><a href="/index/create">create</a></li>
        <li role="presentation"><a href="/index/show">show</a></li>
    </ul>
    <div style="height: 50px;"></div>

    <div class="jumbotron">
        <h1 class="text-center"><?php echo $title; ?></h1>
    </div>
</div>
</body>
<script src="https://cdn.bootcss.com/jquery/2.2.1/jquery.js"></script>
<script>
    $('ul li a').each(function () {
        if($(this).attr('href')==window.location.pathname){
            $(this).parent().addClass('active').siblings().removeClass('active')
        }
    })
</script>
</html>