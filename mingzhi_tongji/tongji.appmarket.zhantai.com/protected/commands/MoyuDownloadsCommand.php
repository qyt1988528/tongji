<?php

require_once(Yii::app()->basePath . '/components/phpQuery/phpQuery.php');
class MoyuDownloadsCommand extends CConsoleCommand {
    public function actionIndex() {
        $url ='http://android.myapp.com/myapp/detail.htm?apkName=me.thinknext.shufa';
        phpQuery::newDocumentFile($url);
        $div = pq(".det-ins-num")->html();
        $downloads = str_replace('下载','',$div);
        if(preg_match("/^([1-9][0-9]*)$/",$downloads)==true){
            $ctime = date('Y-m-d H:i:s');
            $sql = "insert into moyu_downloads(downloads,ctime) VALUES(".$downloads.",'".$ctime."')";
            $command = Yii::app()->db->createCommand($sql);
            $command->execute();
        }
    }
}
