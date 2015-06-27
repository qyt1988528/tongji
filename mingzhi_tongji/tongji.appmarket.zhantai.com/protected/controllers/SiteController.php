<?php

class SiteController extends Controller
{
    public $layout = "//layouts/tongji";

	public function actionIndex()
	{
        $start = isset($_GET['start']) ? $_GET['start'] : date("Y-m-d");
        $end = isset($_GET['end']) ? $_GET['end'] : date("Y-m-d");
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $where = '';
        $whereArray = array(':start'=>$start.' 00:00:00', ':end'=>$end.' 23:59:59');
        if(!empty($name)) {
            $where .= ' and title like :name';
            $whereArray[':name'] = $name.'%';
        }

        $tongji = new TongjiData;
        $criteria = new CDbCriteria;
        $criteria->condition = 'searchtime >= :start and searchtime <= :end' . $where;
        $criteria->params = $whereArray;
        if(!empty($type)) {
            $typeIds = TongjiType::model()->getTypeIdsByPid($type);
            $criteria->addInCondition("type_id", $typeIds);
        }
        $criteria->order = 'type_id,id';
        //$count = $tongji->count($criteria);
	//默认显示100页
        $count = 4000;
        $pager = new CPagination($count);
        $pager->pageSize = 40;
        $pager->applyLimit($criteria);
        $datas = $tongji->findAll($criteria);

        $this->render('index', array(
            'start'=>$start,
            'end'=>$end,
            'name'=>$name,
            'datas'=>$datas,
            'pages'=>$pager,
            'types'=>TongjiType::model()->findAll("pid = :pid",array(":pid"=>0)),
            'choosedType'=>$type,
        ));
	}
    
    public function actionShow() {
        $id = $_GET['id'];
        $tongjiData = new TongjiData;
        $one = $tongjiData->findByPk($id);
        if(!$one) {
            throw new CHttpException(404, '暂无数据，数据错误');
        }
        $datas = $tongjiData->getOldDatas(7, $one);
        foreach($datas as $data) {
            $categories[] = $data['searchtime']; 
            $values[] = (int)$data['ranking']; 
        }

        $jsonArray = array(
            'title' => array('text'=>'七天内折线图','x'=>-20),
            'xAxis' => array('categories'=>$categories),
            'yAxis' => array('title'=>array('text'=>'应用排行'),'plotLines'=>array(array('value'=>0,'width'=>1,'color'=>'#808080'))),
            'legend' => array('layout'=>'vertical','align'=>'right','verticalAlign'=>'middle','borderWidth'=>0),
            'series' => array(array('name'=>$one['title'],'data'=>$values))
        );

        $this->render('show', array(
            'jsonArray'=>$jsonArray,
        ));
    }
    public function getShowUrl($id) {
        return '/site/show/id/'.$id;
    }
    public function actionOutExcel(){  
        $start = isset($_GET['start']) ? $_GET['start'] : date("Y-m-d");
        $end = isset($_GET['end']) ? $_GET['end'] : date("Y-m-d");
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $where = '';
        $whereArray = array(':start'=>$start.' 00:00:00', ':end'=>$end.' 23:59:59');
        if(!empty($name)) {
            $where .= ' and title like :name';
            $whereArray[':name'] = $name.'%';
        }

        $tongji = new TongjiData;
        $criteria = new CDbCriteria;
        $criteria->condition = 'searchtime >= :start and searchtime <= :end' . $where;
        $criteria->params = $whereArray;
        if(!empty($type)) {
            $typeIds = TongjiType::model()->getTypeIdsByPid($type);
            $criteria->addInCondition("type_id", $typeIds);
        }
        $criteria->order = 'type_id,id';
        $criteria->offset = ($page - 1) * 40;
        $criteria->limit = 40;
        $datas = $tongji->findAll($criteria);

        ob_end_clean();  
        ob_start();  

        $objPHPExcel = new PHPExcel();  

        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")  
            ->setCategory("Test result file");  
        $objPHPExcel->setActiveSheetIndex(0)  
            ->setCellValue('A1', 'ID')  
            ->setCellValue('B1', '名称')  
            ->setCellValue('C1', '平台渠道')  
            ->setCellValue('D1', '排名')  
            ->setCellValue('E1', '采集时间');  

        if(!empty($datas)){  
            $i =2;  
            foreach ($datas as $v){  
                $objPHPExcel->setActiveSheetIndex(0)  
                    ->setCellValue("A$i", $v['id'])  
                    ->setCellValue("B$i", $v['title'])  
                    ->setCellValue("C$i", $v->types->type)  
                    ->setCellValue("D$i", $v['ranking'])  
                    ->setCellValue("E$i", $v['searchtime']);  
                $i++;          
            }  
        }             
        $objPHPExcel->getActiveSheet()->setTitle('采集数据');  
        $objPHPExcel->setActiveSheetIndex(0);  
        $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);  

        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");  
        header("Content-Type:application/force-download");  
        header("Content-Type:application/vnd.ms-execl");  
        header("Content-Type:application/octet-stream");  
        header("Content-Type:application/download");  
        $fireName = date("YmdHis") . '数据导出';  
        header("Content-Disposition:attachment;filename=$fireName.xls");  
        header("Content-Transfer-Encoding:binary");  
        $objWriter->save("php://output");  

        Yii::app()->end();  
        spl_autoload_register(array('YiiBase','autoload'));  
    }

    public function actionMoyu(){
        $start = isset($_GET['start']) ? $_GET['start'] : date("Y-m-d", strtotime("-7 days"));
        $start = $start.' 00:00:00';
        $end = isset($_GET['end']) ? $_GET['end'] : date("Y-m-d");
        $end = $end.' 23:59:59';
        $sql ="select downloads,ctime from moyu_downloads where ctime >= '".$start."' and ctime <='".$end."' order by id;";
        $command = Yii::app()->db->createCommand($sql);
        $datas = $command->queryAll();
        if(!$datas) {
            throw new CHttpException(404, '暂无数据，数据错误');
        }
        foreach($datas as $data) {
            $categories[] = $data['ctime'];
            $values[] = (int)$data['downloads'];
        }

        $jsonArray = array(
            'title' => array('text'=>'七天内折线图','x'=>-20),
            'xAxis' => array('categories'=>$categories),
            'yAxis' => array('title'=>array('text'=>'下载量'),'plotLines'=>array(array('value'=>0,'width'=>1,'color'=>'#808080'))),
            'legend' => array('layout'=>'vertical','align'=>'right','verticalAlign'=>'middle','borderWidth'=>0),
            'series' => array(array('name'=>'墨语书法','data'=>$values))
        );

        $this->renderPartial('moyu', array(
            'jsonArray'=>$jsonArray,
            'start' => $start,
            'end' => $end
        ));
    }

}
