<?php 
class JsonDataHandler{ 
    private $jsonFile = "jsonFiles/data.json"; 
     
 
    public function getRows(){ 
        if(file_exists($this->jsonFile)){ 
            $jsonData = file_get_contents($this->jsonFile); 
            $data = json_decode($jsonData, true); 
             
            if(!empty($data)){ 
                usort($data, function($a, $b) { 
                    return $b['id'] - $a['id']; 
                }); 
            } 
             
            return !empty($data)?$data:false; 
        } 
        return false; 
    } 
     
    public function getSingle($id){ 
        $jsonData = file_get_contents($this->jsonFile); 
        $data = json_decode($jsonData, true); 
        $singleData = array_filter($data, function ($var) use ($id) { 
            return (!empty($var['id']) && $var['id'] == $id); 
        }); 
        $singleData = array_values($singleData)[0]; 
        return !empty($singleData)?$singleData:false; 
    } 
     
    public function insert($newData){ 
        if(!empty($newData)){ 
            $id = time(); 
            $newData['id'] = $id; 
             
            $jsonData = file_get_contents($this->jsonFile); 
            $data = json_decode($jsonData, true); 
             
            $data = !empty($data)?array_filter($data):$data; 
            if(!empty($data)){ 
                array_push($data, $newData); 
            }else{ 
                $data[] = $newData; 
            } 
            $insert = file_put_contents($this->jsonFile, json_encode($data)); 
             
            return $insert?$id:false; 
        }else{ 
            return false; 
        } 
    } 
}