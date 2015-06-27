<?php
class Crawler 
{
    public static function curl($url, $proxy = null, $port = '80') {
        $ch = curl_init();
        if($proxy) {
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_PROXYPORT, $port); 
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_NOSIGNAL, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        
        return curl_exec($ch);
    }

    public static function curlMulti($urls, $proxy = null, $port = 80) {    
        $queue = curl_multi_init();
        $map = array();
        foreach($urls as $id => $url) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 60);
            curl_setopt($ch, CURLOPT_NOSIGNAL, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
             if($proxy) {
                curl_setopt($ch, CURLOPT_PROXY, $proxy);
                curl_setopt($ch, CURLOPT_PROXYPORT, $port);
            }
            curl_multi_add_handle($queue, $ch);
            $map[$id] = $ch;
        }
        $active = null;
        do { 
            $mrc = curl_multi_exec($queue, $active);
        } while($mrc == CURLM_CALL_MULTI_PERFORM); 

        while($active > 0 && $mrc == CURLM_OK) {
            if(curl_multi_select($queue, 0.5) != -1) {
                do{
                    $mrc = curl_multi_exec($queue, $active);
                } while ($mrc == CURLM_CALL_MULTI_PERFORM);
            }
        }
        $responses = array();
        foreach($map as $url=>$ch) {
            $responses[$url] = curl_multi_getcontent($ch);
            curl_multi_remove_handle($queue, $ch);
            curl_close($ch);
        }
        curl_multi_close($queue);
        return $responses;
    }
}
