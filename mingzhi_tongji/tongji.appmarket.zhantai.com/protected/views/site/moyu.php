<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/datepicker.css">
    <style>
        .container{width:100%;}
        #footer{width:960;margin:auto;}
    </style>
</head>
<body>
<div class="container" id="page">
    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <form method="get" action="">
        开始时间：<input type="text" name="start" data-date-format="yyyy-mm-dd" readonly id="start_time" value="<?php echo $start; ?>">
        结束时间：<input type="text" name="end" data-date-format="yyyy-mm-dd" readonly id="end_time" value="<?php echo $end; ?>">
        <input type="submit" id="all_search" value="搜索">
        </form>
    <div class="clear"></div>
    <div id="footer">
    </div><!-- footer -->
</div><!-- page -->

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap-datepicker.js"></script>
<script src="/js/view.js"></script>
<script type="text/javascript">
    $(function () {
        $('#container').highcharts(<?php echo json_encode($jsonArray); ?>);
    });
</script>
<script src="/js/highcharts.js"></script>
</body>
</html>
