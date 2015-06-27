<?php
require_once(Yii::app()->basePath . '/components/phpQuery/phpQuery.php');

class CrawlPcCommand extends CConsoleCommand {
    private $itoolsUrl = 'http://ios.itools.cn';

    public function actionIndex() {
        $this->_tryGetItools($this->itoolsUrl);
    }

    private function _tryGetItools($url, $count = 3) {
        $result = Crawler::curl($url);
        //$result = file_get_contents(Yii::app()->basePath . '/itools.html');
        if($result) {
            phpQuery::newDocumentHtml($result);
            $bestLis = pq('#daySelectCon ul.ios_app_list li');
            $this->_itoolsSave($bestLis, 11);
            $softLis = pq('.ios_box:eq(2)')->find('ul.ios_app_list li');
            $this->_itoolsSave($softLis, 12);
            return true;
        } elseif($count !== 0) {
            $count--; 
            sleep(1);
            return $this->_tryGetItools($url, $count);
        }
        return false;
    }
    function _itoolsSave($lis, $type) {
        foreach($lis as $k=>$li) {
            $array['title'] = pq($li)->find('.ios_app_cur')->find('.ios_app_curTxt')->eq(0)->text();
            $array['ranking'] = $k + 1;
            $array['type'] = $type;
            $array['searchtime'] = date("Y-m-d H:i:s");
            $tongji = new TongjiData;
            $tongji->insertData($array);
        }
    }
}
