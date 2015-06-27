<?php
/**
 * Created by PhpStorm.
 * User: yutao
 * Date: 15/5/29
 * Time: 上午10:49
 */
require("/vagrant/cndzys/cndzys_special/protected/components/phpQuery/phpQuery.php");
$url ='http://android.myapp.com/myapp/detail.htm?apkName=me.thinknext.shufa';
    phpQuery::newDocumentFile($url);
$div = pq(".det-ins-num")->html();
var_dump($div);
