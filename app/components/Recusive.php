<?php
namespace App\components;

class Recusive{
    private $data;
    private $html = '';
    public function __construct($data){
        $this->data = $data;
    }

    public function RecusiveCategory($partent,$id = 0,$text = ''){
        foreach($this->data as $value){
            if($value['partent_Id']==$id){
                if(!empty($partent)&&$partent==$value['id']){
                    $this->html.= "<option selected value = '". $value['id'] ."'>".$text.$value['nameCategory']."</option>"; 
                }
                    else{
                        $this->html.= "<option value = '". $value['id'] ."'>".$text.$value['nameCategory']."</option>"; 
                        $this->RecusiveCategory($partent,$value['id'],$text.'-');
                    }
            }
        }
        return $this->html;
    }
}
