<?php

class Navigator {

    
    public function whoisnavigator($agentGetters){
        $obj = new stdClass();
        $obj->agent = $agentGetters;
        $obj->platform = $this->platform($obj->agent);
        $obj->version = $this->versionPreview($obj->agent);
        $obj->navigator = $this->navigatorView($obj->agent); 
        $obj->navigatorName = $this->navigatorNameView($obj->agent);
        return $obj;
    }

    public function versionPreview($useragent){
        $objBrowser = explode(' ', $useragent);
        return $objBrowser[0];
    }

    public function platform($useragent){ 
        $browser = preg_split('//', $useragent, -1, PREG_SPLIT_NO_EMPTY);
        $status = $continue = 0;
        $strplatform = "";
        foreach($browser as $b){
            if($continue == 0 ){ if($b == '('){ $status = 1; } }
            if($status == 1){
                $strplatform = $strplatform . $b ;
            }
            if($continue == 0 ){ if($b == ')'){ $status = 0; $continue = 1; } } 
        }
        return $strplatform;
    }
    
    public function navigatorView($navigator){
        $array_navigator = explode('(KHTML, like Gecko)', $navigator);
        if(count($array_navigator) == 2){
            $pos = preg_replace("/[^a-z A-Z]/", "", $array_navigator[1]); 
            return $pos;
        }
        return "";
    }
    
    public function navigatorNameView($navigator){ 
        if( (strpos($navigator, 'Chrome') !== false) && (strpos($navigator, 'Edg') !== false) && (strpos($navigator, 'Safari') !== false) ){
            return "Microsoft Edge";
        }else if( (strpos($navigator, 'Chrome') !== false) && (strpos($navigator, 'Safari') !== false)  && (strpos($navigator, 'OPR') !== false)  ){
            return "Opera";
        }else if( (strpos($navigator, 'Chrome') !== false) && (strpos($navigator, 'Safari') !== false) ){
            return "Google Chrome";
        }else if( (strpos($navigator, 'Gecko') !== false) && (strpos($navigator, 'Firefox') !== false) ){
            return "Mozilla Firefox";
        }else if( (strpos($navigator, 'Gecko') !== false) ){
            return "Microsoft Internet Explore";
        }else if( (strpos($navigator, 'Safari') !== false) ){
            return "Safari";
        }
        return "";
    }
}


echo json_encode((new Navigator)->whoisnavigator($_SERVER['HTTP_USER_AGENT']));





// echo(get_browser($_SERVER['HTTP_USER_AGENT']));

// file_put_contents('navigator'.time().'.txt', $_SERVER['HTTP_USER_AGENT']);

// $browser = get_browser(null, true);
// print_r($browser['platform']);


?>