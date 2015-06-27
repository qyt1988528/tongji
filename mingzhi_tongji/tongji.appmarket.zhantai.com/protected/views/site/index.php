<style>
.main{width:960px;margin:auto;padding:20px;}
.tr{margin:auto;}
</style>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/datepicker.css">
<div class="main">
        <form method="get" action="">
            开始时间：<input type="text" name="start" data-date-format="yyyy-mm-dd" readonly id="start_time" value="<?php echo $start; ?>">
            结束时间：<input type="text" name="end" data-date-format="yyyy-mm-dd" readonly id="end_time" value="<?php echo $end; ?>">
            渠道分类：
            <select name="type">
                <option value="">全部</option>
                <?php foreach($types as $type) { ?>
                <option value="<?php echo $type->id; ?>" <?php if($type->id == $choosedType) {echo "selected";} ?>><?php echo $type->type; ?></option>
                <?php } ?>
            </select>
            应用名称：<input type="test" name="name" value="<?php echo $name; ?>">
            <input type="submit" value="搜索">
        </form>
</div>
<div class="main">
    <table border='1' width='900'>
        <tr><td>ID</td><td>名称</td><td>平台</td><td>排名</td><td>采集时间</td></tr>
        <?php foreach($datas as $k=>$data) { ?>
        <tr <?php echo ($k%2==0) ? 'bgcolor="#eee"' : ''; ?>><td><?php echo $data['id']; ?></td><td><a href="<?php echo $this->getShowUrl($data['id']); ?>"><?php echo $data['title']; ?></a></td><td><?php echo $data->types->type; ?></td><td><?php echo $data['ranking']; ?></td><td><?php echo $data['searchtime']; ?></td></tr>
    <?php } ?>
    </table>
<?php                                                                           
$this->widget('CLinkPager', array(
    'header'=>'',
    'firstPageLabel'=>'首页',
    'lastPageLabel'=>'末页',
    'prevPageLabel'=>'上一页',
    'nextPageLabel'=>'下一页',
    'pages'=>$pages,
    'maxButtonCount'=>7,
));                                                                              
?> 
</div>
<div class="main">
    <a href="/site/outexcel?<?php echo $_SERVER['QUERY_STRING']; ?>" class="btn btn-default">倒出数据</a>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap-datepicker.js"></script>
<script src="/js/view.js"></script>
