<?php
/**
 * Description of cand_social
 *
 * @author tsiva
 */
class gav_rss_news extends BaseModel{
    protected $table = 'gav_rss_news';
    protected $primaryKey  = 'id';
    protected $tempServiceApiKey = 'Eyk98oZvvO043EYWs3oaDVoFB26X1i7c';
    protected $tempServiceApiUrl = 'http://tempservice.confidis.local/index.php?r=api/';
    
    protected $fillable = ['md5_key','ts','link','title','text','original_text','insert_date','update_date'];
    
    protected $checkFields = [
    ];
    protected $checkFieldNames = [
    ];
    
    public function getLastGavNews(){
        $saveObj = $this
                ->orderBy('id', 'desc')
                ->first();
        return (!empty($saveObj->md5_key) ? $saveObj->md5_key: false);
    }
    
    public function getGavRssNewsFromTempService(){
        $lastMd5Key = $this->getLastGavNews();
        
        $arrGavNews = $this->getFromTempservice('getGavNews', array('limit' => 10, 'md5Key' => $lastMd5Key));
        if(!empty($arrGavNews) && (!array_key_exists('error', $arrGavNews) && !array_key_exists('info', $arrGavNews))){          
            foreach($arrGavNews as $gavNews){
                $this->insert($gavNews);
            }
        }
    }
    
    public function getFromTempservice($calledFunction,$data){
        /*Creates the endpoint URL*/
        $calledFunction = strtolower($calledFunction);
        $request_url = $this->tempServiceApiUrl.$calledFunction;

        /*Adds the Key, Secret, & Datatype to the passed array*/
        $data['apiKey'] = $this->tempServiceApiKey;

        $postFields = http_build_query($data);
        
        /*Preparing Query...*/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        $response = curl_exec($ch);
        curl_close($ch); 

        if(!$response){
            return false;
        }
        /*Return the data in JSON format*/
        return json_decode($response,true);
    }
}