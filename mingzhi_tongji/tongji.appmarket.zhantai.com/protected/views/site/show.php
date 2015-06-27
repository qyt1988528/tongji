<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script src="/js/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
    $('#container').highcharts(<?php echo json_encode($jsonArray); ?>);
});
</script>
<script src="/js/highcharts.js"></script>
