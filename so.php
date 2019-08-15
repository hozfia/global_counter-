<?php


class api
{
   public $url = "http://worldtimeapi.org/api/ip" ; 
   
   
   private function apidata()
   {
    $url = $this->url; 
    $data = file_get_contents($url);
    $characters = json_decode($data,true); 
    // echo $characters["utc_datetime"]."</br>" ;
    // echo $characters["utc_offset"]."</br>" ;
    // echo $characters["timezone"]."</br>" ;
    //echo $characters["client_ip"]."</br>" ;
    $array = array('datetime' => $characters["utc_datetime"] , "offest" => $characters["utc_offset"], "timezone" => $characters["timezone"], "ip" =>$characters["client_ip"] );
    return $array ; 
    }
    public function time_parsing()
    {
        $D = $this->apidata();
        $time = $D["datetime"] ;
        $my_array  = preg_split("/[T.]+/", $time); 
        $time_fin = $my_array[1] ;
        $my_array2  = preg_split("/[:]+/", $time_fin);
        $time_arry = array("H"=>$my_array2[0] , "M"=>$my_array2[1] , "S" =>$my_array2[2]) ; 
        return $time_arry ; 
    }
    public function date_parsing()
    {
        $D = $this->apidata() ; 
        $date = $D["datetime"] ; 
        $p = preg_split("/[-T]+/",$date) ; 
        $date = array("year"=>$p[0],"month"=>$p[1],"day"=>$p[2]) ;
        return $date ; 
        //print_r($date) ;
    }
    public function offest_parsing()
    {
        $D = $this->apidata() ; 
        $date = $D["offest"] ; 
        $p = preg_split("/[+:]+/",$date) ;
        return $p[1] ; 
        //print_r($p) ;
    }

}

$obj = new api ; 
echo $obj->offest_parsing() ; 
?>