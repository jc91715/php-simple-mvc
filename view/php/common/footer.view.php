</body>
<script src="https://cdn.bootcss.com/jquery/2.2.1/jquery.js"></script>
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
</html>