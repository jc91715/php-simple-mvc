</body>
<script src="//cdn.bootcss.com/jquery/2.2.1/jquery.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap-markdown/2.10.0/js/bootstrap-markdown.min.js"></script>
<script src="https://cdn.bootcss.com/showdown/1.7.4/showdown.min.js"></script>
<script>
    $('ul li a').each(function () {
        if($(this).attr('href')==window.location.pathname){
            $(this).parent().addClass('active')
        }
    })

    if(window.location.pathname=='/'){
        $('ul li a:first').parent().addClass('active')
    }
</script>
<script>
    $("#content").markdown({autofocus:true,savable:false})
    var markdown = new showdown.Converter();
    markdown.toHTML = function(val) {
        return markdown.makeHtml(val);
    }

</script>
</html>
