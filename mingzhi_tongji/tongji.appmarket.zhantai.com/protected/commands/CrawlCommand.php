<?php

class CrawlCommand extends CConsoleCommand {
    private $itools_request = array(
        8=>array(
            '1'=>'UAYdGcB4ib2/R4FqUvMxMCXTUAJ4wjbTy7SRPbm2MoHUDcb9XsPahz4ssjl8HKru+ct30FURz8YRoSYlAoWVxQPXR0y0VBx2L1BzGWRyBubzwZvvk4YUQoTamK3B3KsmNzM8DR5kc7PrLVxWpTP+r7eOmAOfQi4ncrWxL/dTQQGR30T71Is9EcgV7DiYgbhlThX+FjHH11ZrmPVF65VLl6hbGKLoyazNoUW83UjSq6xB02Bnqsp7Rwj4PCFNQX1rfYVlZ50wvt2iExAJpDJRVH5nGLxy7tooPrJzwTTzk7PsQ47IFoxrkVzbLqAmrnoQ+Q==',
            '2'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+cN9zVRBm4VMv2QzDZSXxB7eIFegClE9HwEzfysRf+n/rJyJjpRdc7noxbfZwKVmPT9/WVJsevTmexMAlnL/p6uM3VyfDWQ1dby6JuwVWRn19lnu2ow0BZkb4mmUg6pfSlmlWF2fwE5liaQRstNFj/kPNfCDir3GslurrV3IpOgY8DFoqcEWJkijG3JlUndwUZFPMMt3ssqzWFgJ83FfUDRqHus8ucRpa/cv2SjhxOy4HNLaFp4y4xiWM7x172xf2+I3ZM/ZZCzSOg==',
            '3'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+cN9zVRBm4VMv2QzDZSXxB7eIFegClE9HwEzfysRf+n/rJyJjpRdc7noxbfZwKVmPT9/WVJsevTmexMAlnL/p6uM3VyfDWQ1dby6JuwVWRn19lnu2ow0BZkb4mmUg6pfSlmlWF2fwE5liaQRstNFj/kPNfCDir3GslurrV3IpOgY8DFoqcAWJkijG3JlUndwUZFPMMt3ssqzWFgJ83FfUDRqHus8ucRpa/cv2SjhxOy4HNLaFp4y4xiWM7x172xf2+I3ZM/ZZCzSOg==',
            '4'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+cN9zVRBm4VMv2QzDZSXxB7eIFegClE9HwEzfysRf+n/rJyJjpRdc7noxbfZwKVmPT9/WVJsevTmexMAlnL/p6uM3VyfDWQ1dby6JuwVWRn19lnu2ow0BZkb4mmUg6pfSlmlWF2fwE5liaQRstNFj/kPNfCDir3GslurrV3IpOgY8DFoqccWJkijG3JlUndwUZFPMMt3ssqzWFgJ83FfUDRqHus8ucRpa/cv2SjhxOy4HNLaFp4y4xiWM7x172xf2+I3ZM/ZZCzSOg==',
            '5'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+cN9zVRBm4VMv2QzDZSXxB7eIFegClE9HwEzfysRf+n/rJyJjpRdc7noxbfZwKVmPT9/WVJsevTmexMAlnL/p6uM3VyfDWQ1dby6JuwVWRn19lnu2ow0BZkb4mmUg6pfSlmlWF2fwE5liaQRstNFj/kPNfCDir3GslurrV3IpOgY8DFoqcYWJkijG3JlUndwUZFPMMt3ssqzWFgJ83FfUDRqHus8ucRpa/cv2SjhxOy4HNLaFp4y4xiWM7x172xf2+I3ZM/ZZCzSOg==',
            '6'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+cN9zVRBm4VMv2QzDZSXxB7eIFegClE9HwEzfysRf+n/rJyJjpRdc7noxbfZwKVmPT9/WVJsevTmexMAlnL/p6uM3VyfDWQ1dby6JuwVWRn19lnu2ow0BZkb4mmUg6pfSlmlWF2fwE5liaQRstNFj/kPNfCDir3GslurrV3IpOgY8DFoqcUWJkijG3JlUndwUZFPMMt3ssqzWFgJ83FfUDRqHus8ucRpa/cv2SjhxOy4HNLaFp4y4xiWM7x172xf2+I3ZM/ZZCzSOg==',
            '7'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+cN9zVRBm4VMv2QzDZSXxB7eIFegClE9HwEzfysRf+n/rJyJjpRdc7noxbfZwKVmPT9/WVJsevTmexMAlnL/p6uM3VyfDWQ1dby6JuwVWRn19lnu2ow0BZkb4mmUg6pfSlmlWF2fwE5liaQRstNFj/kPNfCDir3GslurrV3IpOgY8DFoqcQWJkijG3JlUndwUZFPMMt3ssqzWFgJ83FfUDRqHus8ucRpa/cv2SjhxOy4HNLaFp4y4xiWM7x172xf2+I3ZM/ZZCzSOg==',
            '8'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+cN9zVRBm4VMv2QzDZSXxB7eIFegClE9HwEzfysRf+n/rJyJjpRdc7noxbfZwKVmPT9/WVJsevTmexMAlnL/p6uM3VyfDWQ1dby6JuwVWRn19lnu2ow0BZkb4mmUg6pfSlmlWF2fwE5liaQRstNFj/kPNfCDir3GslurrV3IpOgY8DFoqcsWJkijG3JlUndwUZFPMMt3ssqzWFgJ83FfUDRqHus8ucRpa/cv2SjhxOy4HNLaFp4y4xiWM7x172xf2+I3ZM/ZZCzSOg==',
            '9'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+cN9zVRBm4VMv2QzDZSXxB7eIFegClE9HwEzfysRf+n/rJyJjpRdc7noxbfZwKVmPT9/WVJsevTmexMAlnL/p6uM3VyfDWQ1dby6JuwVWRn19lnu2ow0BZkb4mmUg6pfSlmlWF2fwE5liaQRstNFj/kPNfCDir3GslurrV3IpOgY8DFoqcoWJkijG3JlUndwUZFPMMt3ssqzWFgJ83FfUDRqHus8ucRpa/cv2SjhxOy4HNLaFp4y4xiWM7x172xf2+I3ZM/ZZCzSOg==',
            '10'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+cN9zVRBm4VMv2QzDZSXxB7eIFegClE9HwEzfysRf+n/rJyJjpRdc7noxbfZwKVmPT9/WVJsevTmexMAlnL/p6uM3VyfDWQ1dby6JuwVWRn19lnu2ow0BZkb4mmUg6pfSlmlWF2fwE5liaQRstNFj/kPNfCDir3GslurrV3IpOgY8DFoqcIKKAehEHNsHG9oGqh3N8p899/1CVYHvH1dUjFqCLskodZrY/0v0yLhzua4FtjaHJQy8RaYYrZ/6H1X6ctjfNfDcjPBZcE=',
        ),
        9=>array(
            '1'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+dZg1FVBm4Uelj9uW8KE2RGGAQnyBV8nanQqcidjDfXm1u/6iYlQDrme0LbCrcQpYBhrJ0ExJp/LTV5MwXCuq7aBkR7YAmUwOej9DOoDHEq510W+kcc4C44b9GmQiPBTTEKwQSyajQErmLgD658dyPgEOPqDir3Gslu1qE/Gqroe/jBoqcEWJlapE3FWBm9oGvIJaoc+sJKvHhFHvCoeWABmA6dju8Eoc+s9jnmyn7jsVMDQDp4w+wSEevU2oTkCvqQlZN3RaDHSNMXHUC6+9psRWJPnALNJfQ==',
            '2'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+dZg1FVBm4Uelj9uW8KE2RGGAQnyBV8nanQqcidjDfXm1u/6iYlQDrme0LbCrcQpYBhrJ0ExJp/LTV5MwXCuq7aBkR7YAmUwOej9DOoDHEq510W+kcc4C44b9GmQiPBTTEKwQSyajQErmLgD658dyPgEOPqDir3Gslu1qE/Gqroe/jBoqcEWJlapE3FWBm9oGvIJaoc+sI+hHREJpCIQEz1hCKxquc55OJd3jHa03un7BM7IQc9hoFDQMuc8uTkAvqQlZN3RcC3AfYyEHnvji8EREcisWucGX8ePMHqU8Vk0zw==',
            '3'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+dZg1FVBm4Uelj9uW8KE2RGGAQnyBV8nanQqcidjDfXm1u/6iYlQDrme0LbCrcQpYBhrJ0ExJp/LTV5MwXCuq7aBkR7YAmUwOej9DOoDHEq510W+kcc4C44b9GmQiPBTTEKwQSyajQErmLgD658dyPgEOPqDir3Gslu1qE/Gqroe/jBoqcEWJlapE3FWBm9oGvIJaoc+sI+hHREJpCMQEz1hCKxquc55OJd3jHa03un7BM7IQc9hoFDQMuc8uTkAvqQlZN3RcC3AfYyEHnvji8EREcisWucGX8ePMHqU8Vk0zw==',
            '4'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+dZg1FVBm4Uelj9uW8KE2RGGAQnyBV8nanQqcidjDfXm1u/6iYlQDrme0LbCrcQpYBhrJ0ExJp/LTV5MwXCuq7aBkR7YAmUwOej9DOoDHEq510W+kcc4C44b9GmQiPBTTEKwQSyajQErmLgD658dyPgEOPqDir3Gslu1qE/Gqroe/jBoqcEWJlapE3FWBm9oGvIJaoc+sI+hHREJpCQQEz1hCKxquc55OJd3jHa03un7BM7IQc9hoFDQMuc8uTkAvqQlZN3RcC3AfYyEHnvji8EREcisWucGX8ePMHqU8Vk0zw==',
            '5'=>'UAYKFdF/j6q/R4FcVe44PGmYAU01gzPS2a/QYrm8IsuMUpKoTNXIx3Bl8mZuFrju+dZg1FVBm4Uelj9uW8KE2RGGAQnyBV8nanQqcidjDfXm1u/6iYlQDrme0LbCrcQpYBhrJ0ExJp/LTV5MwXCuq7aBkR7YAmUwOej9DOoDHEq510W+kcc4C44b9GmQiPBTTEKwQSyajQErmLgD658dyPgEOPqDir3Gslu1qE/Gqroe/jBoqcEWJlapE3FWBm9oGvIJaoc+sI+hHREJpCUQEz1hCKxquc55OJd3jHa03un7BM7IQc9hoFDQMuc8uTkAvqQlZN3RcC3AfYyEHnvji8EREcisWucGX8ePMHqU8Vk0zw==',
        ),
    );
    public function actionAbc(){
        $url ='http://android.myapp.com/myapp/detail.htm?apkName=me.thinknext.shufa';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $code);
        $json = curl_exec($ch);
        $array = json_decode($json, true);
        $json = Crawler::curl($url);
        $array = json_decode($json, true);
        var_dump($array);

    }
    public function actionIndex() {
        $types = TongjiType::model()->findAll();
        $updateTime = date("Y-m-d H:i:s");
        foreach($types as $type) {
            switch($type['pid']) {
                case 1:
                if($this->_saveXYData($type)) {
                    TongjiType::model()->updateCrawlTime($type['id'], $updateTime);
                }
                break;
                case 4:
                    $this->_saveAishiData($type);
                    TongjiType::model()->updateCrawlTime($type['id'], $updateTime);
                break;
                case 7:
                    $this->_saveItoolsData($type);
                    TongjiType::model()->updateCrawlTime($type['id'], $updateTime);
                break;
                case 16:
                    $this->_saveHMData($type);
                    TongjiType::model()->updateCrawlTime($type['id'], $updateTime);
                    break;
                case 35:
                    $this->_saveKYData($type);
                    TongjiType::model()->updateCrawlTime($type['id'], $updateTime);
                    break;
                case 171:
                    $this->_saveFNData($type);
                    TongjiType::model()->updateCrawlTime($type['id'], $updateTime);
                    break;
                default:break;
            }
        }
    }



    private function _saveHMData($type){
        if(!$type['url']){
            return false;
        }
        $datas = $this->_tryGetHMData($type['url']);
        if(!$datas) {
            $message = 'curl地址失败,失败分类：' . $type['type'];
            Yii::log($message, 'error', 'tongji.Crawler');
            return false;
        }
        $values ='';
        foreach($datas as $k=>$data){
            $array['title'] = str_replace(',','',$data);
            $array['title'] = str_replace('，','',$array['title']);
            $array['title'] = str_replace("'","",$array['title']);
            $array['ranking'] = $k + 1;
            $array['type'] = $type['id'];
            $array['searchtime'] = date("Y-m-d H:i:s");
            $values .= "('".$array['title']."',".$array['ranking'].",".$array['type'].",'".$array['searchtime']."'),";
            if($k%100==0){
                $values = rtrim($values,',');
                $sql = 'insert into tongji_data(title,ranking,type_id,searchtime) VALUES'.$values;
                $command = Yii::app()->db->createCommand($sql);
                $command->execute();
                $values ='';
            }
            //$tongji = new TongjiData;
            //$tongji->insertData($array);
        }
        if($values!=''&&strlen($values)>5) {
            $values = rtrim($values, ',');
            $sql = 'insert into tongji_data(title,ranking,type_id,searchtime) VALUES' . $values;
            $command = Yii::app()->db->createCommand($sql);
            $command->execute();
        }

    }
    private function _tryGetHMData($url, $count = 3) {
        $json = Crawler::curl($url);
        $array = json_decode($json, true);
        if(!empty($array)){
            $data = array();
            foreach($array['response'] as $k=>$arr) {
                $data[] = $arr['SWName'];
            }
            return $data;
        }elseif($count !== 0){
            $count--;
            sleep(1);
            return $this->_tryGetHMData($url, $count);
        }
        return array();

    }
    //蜂鸟助手  原名 好易助手
    private function _saveFNData($type) {
        if(!$type['url']){
            return false;
        }
        $datas = $this->_tryGetFNData($type['url'],$type['id']);
        if(!$datas) {
            $message = 'curl地址失败,失败分类：' . $type['type'];
            Yii::log($message, 'error', 'tongji.Crawler');
            return false;
        }

        $values ='';
        foreach($datas as $k=>$data){
            $array['title'] = str_replace(',','',$data);
            $array['title'] = str_replace('，','',$array['title']);
            $array['title'] = str_replace("'","",$array['title']);
            $array['ranking'] = $k + 1;
            $array['type'] = $type['id'];
            $array['searchtime'] = date("Y-m-d H:i:s");
            $values .= "('".$array['title']."',".$array['ranking'].",".$array['type'].",'".$array['searchtime']."'),";
            if($k%100==0){
                $values = rtrim($values,',');
                $sql = 'insert into tongji_data(title,ranking,type_id,searchtime) VALUES'.$values;
                $command = Yii::app()->db->createCommand($sql);
                $command->execute();
                $values ='';
            }
            //$tongji = new TongjiData;
            //$tongji->insertData($array);
        }
        if($values!=''&&strlen($values)>5) {
            $values = rtrim($values, ',');
            $sql = 'insert into tongji_data(title,ranking,type_id,searchtime) VALUES' . $values;
            $command = Yii::app()->db->createCommand($sql);
            $command->execute();
        }

    }
    private function _tryGetFNData($url, $id,$count = 3) {
        if($id>=200){
            $data = array();
            $urls = explode("\n",$url);
            foreach($urls as $fnurl){
                $json = Crawler::curl($fnurl);
                $array = json_decode($json, true);
                if(!empty($array)){
                    foreach($array['response'] as $k=>$arr) {
                        $data[] = $arr['swName'];
                    }
                }elseif($count !== 0){
                    $count--;
                    sleep(1);
                    return $this->_tryGetFNData($url, $count);
                }

            }
            return $data;

        }elseif($id==198 || $id==199){
            $json = Crawler::curl($url);
            $array = json_decode($json, true);
            if(!empty($array)){
                $data = array();
                foreach($array['rcmdImg'] as $k=>$arr) {
                    $data[] = $arr['riName'];
                }
                return $data;
            }elseif($count !== 0){
                $count--;
                sleep(1);
                return $this->_tryGetFNData($url, $count);
            }

        }else{
            $json = Crawler::curl($url);
            $array = json_decode($json, true);
            if(!empty($array)){
                $data = array();
                foreach($array['response'] as $k=>$arr) {
                    $data[] = $arr['swName'];
                }
                return $data;
            }elseif($count !== 0){
                $count--;
                sleep(1);
                return $this->_tryGetFNData($url, $count);
            }
        }


        return array();

    }
    /*
     * 差PP助手 和 同步推
    //PP助手
    private function _savePPData($type) {}
    private function _tryGetPPData($url, $code,$count = 3) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $code);
        $json = curl_exec($ch);
        $array = json_decode($json, true);

        if(isset($array)) {
            return $array;
        } elseif($count !== 0) {
            $count--;
            sleep(1);
            return  $this->_tryGetPPData($url, $code,$count);
        }
        return array();
    }
    */
    //快用助手
    private function _saveKYData($type) {
        if(!$type['url']){
            return false;
        }
        $datas = $this->_tryGetKYData($type['url']);
        if(!$datas) {
            $message = 'curl地址失败,失败分类：' . $type['type'];
            Yii::log($message, 'error', 'tongji.Crawler');
            return false;
        }
        $values ='';
        foreach($datas as $k=>$data){
            $array['title'] = str_replace(',','',$data);
            $array['title'] = str_replace('，','',$array['title']);
            $array['title'] = str_replace("'","",$array['title']);
            $array['ranking'] = $k + 1;
            $array['type'] = $type['id'];
            $array['searchtime'] = date("Y-m-d H:i:s");
            $values .= "('".$array['title']."',".$array['ranking'].",".$array['type'].",'".$array['searchtime']."'),";
            if($k%100==0){
                $values = rtrim($values,',');
                $sql = 'insert into tongji_data(title,ranking,type_id,searchtime) VALUES'.$values;
                $command = Yii::app()->db->createCommand($sql);
                $command->execute();
                $values ='';
            }
            //$tongji = new TongjiData;
            //$tongji->insertData($array);
        }
        if($values!=''&&strlen($values)>5) {
            $values = rtrim($values, ',');
            $sql = 'insert into tongji_data(title,ranking,type_id,searchtime) VALUES' . $values;
            $command = Yii::app()->db->createCommand($sql);
            $command->execute();
        }
    }
    private function _tryGetKYData($url, $count = 3) {
        $data = array();
        $urls = explode("\n",$url);
        foreach($urls as $kyurl){
            if($kyurl!=''){
                $json = Crawler::curl($kyurl);
                $array = json_decode($json, true);
                if(isset($array['data'])&&($array['data']!=null)){
                    foreach($array['data'] as $k=>$arr) {
                        if(isset($arr['appname'])){
                            $data[] = $arr['appname'];
                        }
                    }
                }elseif($count !== 0){
                    $count--;
                    sleep(1);
                    return $this->_tryGetKYData($url, $count);
                }
            }
        }
        return $data;

    }

    //XY苹果助手
    private function _saveXYData($type) {
        if(!$type['url']) {
            return false;
        }

        for($i=1;$i<9;$i++) {
            if(($type['id']>=149&&$type['id']<=162&&$i=4)||(($type['id']==3||$type['id']==168)&&$i==2)){
                break;
            }
            if($type['id']==2){
                $datas = $this->_tryGetXYData($type['url'], $i,170);
            }else{
                $datas = $this->_tryGetXYData($type['url'], $i);
            }
            if (!$datas) {
                $message = 'curl地址失败,失败分类：' . $type['type'];
                Yii::log($message, 'error', 'tongji.Crawler');
                return false;
            }

            $values ='';
            foreach($datas as $k=>$data){
                $array['title'] = $data['title'];
                $array['title'] = str_replace(',','',$array['title']);
                $array['title'] = str_replace('，','',$array['title']);
                $array['title'] = str_replace("'","",$array['title']);
                $array['ranking'] = $data['ranking'];
                $array['type'] = $type['id'];
                $array['searchtime'] = date("Y-m-d H:i:s");
                $values .= "('".$array['title']."',".$array['ranking'].",".$array['type'].",'".$array['searchtime']."'),";
                if($k%100==0){
                    $values = rtrim($values,',');
                    $sql = 'insert into tongji_data(title,ranking,type_id,searchtime) VALUES'.$values;
                    $command = Yii::app()->db->createCommand($sql);
                    $command->execute();
                    $values ='';
                }
                //$tongji = new TongjiData;
                //$tongji->insertData($array);
            }
            if(strlen($values)>5&&$values!=''){
                $values = rtrim($values,',');
                $sql = 'insert into tongji_data(title,ranking,type_id,searchtime) VALUES'.$values;
                $command = Yii::app()->db->createCommand($sql);
                $command->execute();
            }
            $values ='';
        }
        return true;
    }
    private function _tryGetXYData($url,$page,$type_id=15,$pagesize=20, $count = 3) {
        $url = $url . '&p=' . $page;
        $json = Crawler::curl($url);
        $array = json_decode($json, true);
        if($page==1){
            if (isset($array['data']['banner'])) {
                foreach ($array['data']['banner'] as $b => $v) {
                    $banner['title'] = $v['title'];
                    $banner['ranking'] = $b + 1;
                    $banner['type'] = $type_id;
                    $banner['searchtime'] = date("Y-m-d H:i:s");
                    $tongji = new TongjiData;
                    $tongji->insertData($banner);
                }
            }
        }
        if(isset($array['data']['applist']) ) {
            $k=0;
            foreach($array['data']['applist'] as $v) {
                $datas[$k]['title'] = $v['title'];
                $datas[$k]['ranking'] = ($page-1) * $pagesize + $k + 1;
                $k++;
            }
            return $datas;
        }elseif(isset($array['data']['result'])){
            $j=0;
            foreach($array['data']['result'] as $v) {
                $datasj[$j]['title'] = $v['title'];
                $datasj[$j]['ranking'] = ($page-1) * $pagesize + $j + 1;
                $j++;
            }
            if(isset($datasj)){
                return $datasj;
            }

        }elseif(isset($array['data']['class'])){
            $k=0;
            foreach($array['data']['class'] as $v) {
                $datas[$k]['title'] = $v['title'];
                $datas[$k]['ranking'] = ($page-1) * $pagesize + $k + 1;
                $k++;
            }
            return $datas;

        } elseif($count !== 0) {
            $count--;
            sleep(1);
            return $this->_tryGetXYData($url, $page,$type_id,$pagesize ,$count);
        } 
        return array();
    }
    //兔子助手
    private function _saveItoolsData($type) {
        if(!$type['url']) {
            return false;
        }
        for($i=1;$i<11;$i++) {
            if(isset($this->itools_request[$type['id']][$i])) {
                $request = $this->itools_request[$type['id']][$i];
                $code = base64_decode($request);
                $datas = $this->_tryGetItoolsData($type['url'], $i, $code);
                if(!$datas) {
                    $message = 'curl地址失败,失败分类：' . $type['type'];
                    Yii::log($message, 'error', 'tongji.Crawler');
                }
                $values ='';
                foreach($datas as $k=>$data) {
                    if(isset($data['name'])) {
                        $array['title'] = $data['name'];
                        $array['title'] = str_replace(',','',$array['title']);
                        $array['title'] = str_replace('，','',$array['title']);
                        $array['title'] = str_replace("'","",$array['title']);
                        $array['ranking'] = ($i - 1) * 20 + $k + 1;
                        $array['type'] = $type['id'];
                        $array['searchtime'] = date("Y-m-d H:i:s");
                        $values .= "('".$array['title']."',".$array['ranking'].",".$array['type'].",'".$array['searchtime']."'),";
                        if($k%100==0){
                            $values = rtrim($values,',');
                            $sql = 'insert into tongji_data(title,ranking,type_id,searchtime) VALUES'.$values;
                            $command = Yii::app()->db->createCommand($sql);
                            $command->execute();
                            $values ='';
                        }
                    }
                }
                if($values!=''&&strlen($values)>5) {
                    $values = rtrim($values, ',');
                    $sql = 'insert into tongji_data(title,ranking,type_id,searchtime) VALUES' . $values;
                    $command = Yii::app()->db->createCommand($sql);
                    $command->execute();
                }
                $values = '';
            }
        }
    }

    private function _tryGetItoolsData($url, $page, $code, $count = 3) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $code);
        $json = curl_exec($ch);
        $array = json_decode($json, true);

        if(isset($array['content'])) {
            return $array['content'];
        } elseif($count !== 0) {
            $count--;
            sleep(1);
            return $this->_tryGetItoolsData($url, $page,$code,$count);
        } 
        return array();
    }
    //爱思助手
    private function _saveAishiData($type) {
        if(!$type['url']) {
            return false;
        }
        for($i=1;$i<16;$i++) {
            $datas = $this->_tryGetAishiData($type['url'], $i);
            if(!$datas) {
                $message = 'curl地址失败,失败分类：' . $type['type'];
                Yii::log($message, 'error', 'tongji.Crawler');
            }

            $values ='';
            foreach($datas as $k=>$data){
                $array['title'] = str_replace(',','',$data['title']);
                $array['title'] = str_replace('，','',$array['title']);
                $array['title'] = str_replace("'","",$array['title']);
                $array['ranking'] = $data['ranking'];
                $array['type'] = $type['id'];
                $array['searchtime'] = date("Y-m-d H:i:s");
                $values .= "('".$array['title']."',".$array['ranking'].",".$array['type'].",'".$array['searchtime']."'),";
                if($k%100==0){
                    $values = rtrim($values,',');
                    $sql = 'insert into tongji_data(title,ranking,type_id,searchtime) VALUES'.$values;
                    $command = Yii::app()->db->createCommand($sql);
                    $command->execute();
                    $values ='';
                }
                //$tongji = new TongjiData;
                //$tongji->insertData($array);
            }
            if($values!=''&&strlen($values)>5) {
                $values = rtrim($values, ',');
                $sql = 'insert into tongji_data(title,ranking,type_id,searchtime) VALUES' . $values;
                $command = Yii::app()->db->createCommand($sql);
                $command->execute();
            }
            $values ='';
        }

    }

    private function _tryGetAishiData($url, $page, $pagesize=20, $count=3) {
        $url = $url . '&pageno=' . $page;
        $xml = Crawler::curl($url);
        $have_utf = false;
        if(strpos($xml,'UTF-8')!=false){
            $have_utf = true;
        }
        if(strpos($xml,'utf-8')!=false){
            $have_utf = true;
        }
        if($have_utf==false){
            return array();
        }
        $xml = simplexml_load_string($xml);
        if($xml) {
            //首页banner入库
            if($page == 1 && isset($xml->adlist)) {
                $b = 0;
                foreach($xml->adlist->adinfo as $v) {
                    $banner['title'] = $v->name;
                    $banner['ranking'] = ++$b;
                    $banner['type'] = 13;
                    $banner['searchtime'] = date("Y-m-d H:i:s");
                    $tongji = new TongjiData;
                    $tongji->insertData($banner);
                }
            }
            $k=0;
            foreach($xml->applist->app as $v) {
                $datas[$k]['title'] = $v->appname;
                $datas[$k]['ranking'] = ($page-1) * $pagesize + $k + 1;
                $k++;
            }
            return $datas;
        } elseif($count !== 0) {
            $count--;
            sleep(1);
            return $this->_tryGetAishiData($url, $page, $count);
        }
        return array();
    }
    private function _saveAishiBanner() {

    }
}
