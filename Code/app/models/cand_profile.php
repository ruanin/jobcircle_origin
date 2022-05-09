<?php
/**
 * Description of cand_profile
 *
 * @author aschaerer
 */
class cand_profile extends BaseModel{
    protected $table = 'cand_profile';
    protected $primaryKey  = 'cand_profile_id';
    private $extensions = array("jpeg","jpg","png","pdf","doc", "docx","odt", "rtf");
    public $regex = '/[^A-Za-z0-9_,\-]/';
    
    protected $fillable = ['cand_user_id','available_from_id',
                            'f_name','l_name','profession','birthday',
                            'gender','source_url','title','jobmotivation','cvtext',
                            'country_id','ahv_number','nationality','phone','fax','mail','employment','hrc_cand_id','hrc_cand_accounting_number','esrc', 
                            'spontanly'
                            ];
    
    protected $checkFields = [
        'cand_user_id' => ['numeric'],
        'available_from_id' => ['numeric'],
        'f_name' => ['required'],
        'l_name' => ['required'],
        'birthday' => ['required','date']
    ];
    protected $checkFieldNames = [
        'cand_user_id' => 'Kandidat Login',
        'available_from_id' => 'Verfügbar ab',
        'f_name' => 'Vorname',
        'l_name' => 'Name',
        'birthday' => 'Geburtsdatum',
        'source_url' => 'URL Quelle'
    ];
    
    public function uploadCV($profileID, $filename, $tmpname) {
        $filename = str_replace(' ', '_', $filename);        
        if($this->checkFileType($filename) == true){
            $pathInfo = pathinfo($filename);
            $filename = $this->cleanFileName($pathInfo['filename']).'.'.$pathInfo['extension'];
            $uploadfile = $this->getCVUploadFolder($profileID) . $filename;
            if (move_uploaded_file($tmpname, $uploadfile)) {
               return true;
            }
        }
        return false;
    }
    
    public function uploadAttachement($profileID, $filename, $tmpname){
        $filename = str_replace(' ', '_', $filename);

        if($this->checkFileType($filename) == true){
            $pathInfo = pathinfo($filename);
            $filename = $this->cleanFileName($pathInfo['filename']).'.'.$pathInfo['extension'];
            $uploadfile = $this->getAttachementFolder($profileID) . $filename;
            if (move_uploaded_file($tmpname, $uploadfile)) {

               return true;
            }
        }
        return false;
    }
    
    public function getProfileProgress(){
        if(empty($_SESSION['cand_profile_id'])){ return false; }

        $arrProfile = $this->where('cand_profile_id',$_SESSION['cand_profile_id'])
                                    ->where('cand_user_id',$_SESSION['cand_user_id'])
                                    ->first(); 
        $arrCVFiles = $this->getCVFilesList($_SESSION['cand_profile_id']);
       
        $objCandAddress = new cand_address();
        if(!empty($_SESSION['cand_address_id'])){
            $address = $objCandAddress->find($_SESSION['cand_address_id']);
        }else{
            $address = $objCandAddress->where("cand_profile_id", $_SESSION['cand_profile_id'])->first();
        }
        
        $progressPercent = 0;
        if(!empty($arrProfile['f_name'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($arrProfile['l_name'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($arrProfile['birthday'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($arrProfile['gender'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($arrProfile['ahv_number'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($arrProfile['mail'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($arrProfile['profession'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($arrProfile['nationality'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($arrProfile['available_from_id'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($address['country_id'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($address['street'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($address['zip'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($address['city'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(!empty($arrProfile['phone']) || !empty($arrProfile['mobile'])){
          $progressPercent = $progressPercent + 6.66666;  
        }
        if(count($arrCVFiles) > 1){
          $progressPercent = $progressPercent + 6.66666;  
        }

        return $progressPercent;
    }

    public function getCVUploadFolder($profileID) {
        $folder = APPLICATION .'/database/FileDatabase/'.$profileID. '/CV/';
        if (!file_exists($folder)) {
            @mkdir($folder, 0777, true);
        }
        return $folder;
    }
    
    public function getAttachementFolder($profileID){
        $folder = APPLICATION .'/database/FileDatabase/'.$profileID. '/Attachements/';
        if (!file_exists($folder)) {
            @mkdir($folder, 0777, true);
        }
        return $folder;
    }
    
    public function getCVFilesList($profileID) {
        $verzeichnis = $this->getCVUploadFolder($profileID);
        $sortierung = "0"; // Sortierung ("0"=A-Z, "1"=Z-A)
        $arrFiles = array();
        $dateien = scandir($verzeichnis, $sortierung);
        foreach ($dateien as $datei) {
            $fileinfos = pathinfo($verzeichnis . "/" . $datei);
            $filesize = ceil(filesize($verzeichnis . "/" . $datei) / 1024);

            if ($datei != "." && $datei != ".." && $fileinfos['basename']) {
                $dateitypen = array($this->extensions);
                if (in_array($fileinfos['extension'], $dateitypen)) {
                    unset($datei);
                }else{
                    $fileinfos['uploadTime'] = filectime($verzeichnis . "/" . $datei);
                    $arrFiles[] = $fileinfos;
                }
            }
        }
        return $arrFiles;
    }
    
    public function getSingleMimeType($extension = null) {
        $val = $this->getMimeType($extension);
        return $val[0];
    }
     
    public function getMimeType($extension = null, $reverse = false) {
        if (empty($extension)) {
          return false;
        } else {
          $mimeTypes = Array('bc' => Array('cvdata/betterchance', 'text/bc','application/octet-stream'),
                             'txt' => 'text/plain', 'htm' => 'text/html',
                             'html' => 'text/html', 'phtml' => 'text/html',
                             'php' => 'text/html', 'css' => 'text/css',
                             'js' => 'application/javascript',
                             'json' => 'application/json',
                             'xml' => 'application/xml',
                             'swf' => 'application/x-shockwave-flash',
                             // images
                             'png' => Array('image/png', 'image/x-png'),
                             'jpg' => Array('image/jpeg', 'image/pjpeg', 'image/x-jpeg', 'image/x-jpg', 'image/jpe'),
                             'jpe' => Array('image/jpeg', 'image/pjpeg', 'image/jpg', 'image/x-jpeg', 'image/x-jpg', 'image/jpe'),
                             'jpeg' => Array('image/jpeg', 'image/pjpeg', 'image/jpg', 'image/x-jpeg', 'image/x-jpg', 'image/jpe'),
                             'gif' => Array('image/gif', 'image/x-gif'),
                             'bmp' => 'image/bmp',
                             'ico' => 'image/vnd.microsoft.icon',
                             'tiff' => 'image/tiff',
                             'tif' => 'image/tiff',
                             'svg' => 'image/svg+xml',
                             'svgz' => 'image/svg+xml',

                             // archives
                             'zip' => 'application/zip',
                             'rar' => 'application/x-rar-compressed',
                             'exe' => 'application/x-msdownload',
                             'msi' => 'application/x-msdownload',
                             'cab' => 'application/vnd.ms-cab-compressed',

                             // audio/video
                             'mp3' => 'audio/mpeg',
                             'qt' => 'video/quicktime',
                             'mov' => 'video/quicktime',
                             'flv' => 'video/x-flv',
                             'avi' => 'video/avi',

                             // adobe
                             'pdf' => 'application/pdf',
                             'psd' => 'image/vnd.adobe.photoshop',
                             'ai' => 'application/postscript',
                             'eps' => 'application/postscript',
                             'ps' => 'application/postscript',

                             // office
                             'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', //'application/octet-stream',
                             'doc' => 'application/msword',
                             'rtf' => 'application/rtf',
                             'odt' => 'application/odt',
                             'xls' => 'application/vnd.ms-excel',
                             'ppt' => 'application/vnd.ms-powerpoint',

                             // open office
                             'odt' => 'application/vnd.oasis.opendocument.text',
                             'ods' => 'application/vnd.oasis.opendocument.spreadsheet'
                            );

          if (!$reverse) {
            $output = $mimeTypes[strtolower($extension)];
            if ($output == "") $output = "text/plain";
            if (!is_array($output)) $output = Array($output);
          } else {
            foreach($mimeTypes as $target => $mimeData) {
              if (is_array($mimeData)) {
                foreach($mimeData as $mimeTarget) {
                  if ($mimeTarget == strtolower($extension)) {
                    $output = $target;
                    break 2;
                  }
                }
              } else {
                if ($mimeData == strtolower($extension)) {
                  $output = $target;
                  break;
                }
              }
            } 
          }
          return $output;
        }
    }
    
    public function cleanStringFromSpecialCharacterAndWhiteSpace($string,$setLowerCase=true,$replaceChar=''){
        $stringToClean = preg_replace("/([\s\&\.\,\+\-\`\(\)\/\!\?\:\|\\\']{1,})/", $replaceChar, $string);
        if($setLowerCase){
            $stringToClean = mb_strtolower($stringToClean, 'UTF-8');
        }
        return $stringToClean;
    }
    
    public function cleanStringFromSpecialCharacter($string,$setLowerCase=false,$replaceChar=' '){
        $stringToClean = preg_replace("/([\&\.\,\+\-\(\)\/\!\?\:\|\\\']{1,})/", $replaceChar, $string);
        if($setLowerCase){
            $stringToClean = mb_strtolower($stringToClean, 'UTF-8');
        }
        return $stringToClean;
    }
    
    public function getAttachementFilesList($profileID) {
        $verzeichnis = $this->getAttachementFolder($profileID);
        $sortierung = "0"; // Sortierung ("0"=A-Z, "1"=Z-A)
        $arrFiles = array();

        $dateien = scandir($verzeichnis, $sortierung);
        foreach ($dateien as $datei) {
            $fileinfos = pathinfo($verzeichnis . "/" . $datei);
            $filesize = ceil(filesize($verzeichnis . "/" . $datei) / 1024);

            if ($datei != "." && $datei != ".." && $fileinfos['basename']) {
                $dateitypen = array($this->extensions);
                if (in_array($fileinfos['extension'], $dateitypen)) {
                    unset($datei);
                }else{
                    $fileinfos['uploadTime'] = filectime($verzeichnis . "/" . $datei);
                    $arrFiles[] = $fileinfos;
                }
            }
        }
        return $arrFiles;
    }
    
    public function cleanFileName($stringToClean){
        if(!empty($stringToClean)) {
            $stringToClean = trim($stringToClean);
            $search = array("ä", "ö", "ü", "ß", "Ä", "Ö", "Ü");
            $replace = array("ae", "oe", "ue", "ss", "Ae", "Oe", "Ue");
            // regex Filter **********************************************************************
            if(!empty($this->regex)) {
                $stringToClean = str_replace($search, $replace, $stringToClean);
                $stringToClean = preg_replace($this->regex, '', $stringToClean);
                $stringToClean = trim($stringToClean);
            }
            // ***********************************************************************************

            $tempString = '';

            $stringToClean = (!empty($tempString)) ? $tempString : $stringToClean;

        }

        return $stringToClean;
    }
    
    public function getHrcCandCandidateFiles($hrcCandId){
        if(empty($hrcCandId)) return false;
        $arrCandProfiles = $this->where('hrc_cand_id','=',$hrcCandId)->get(['cand_profile_id']);
        $arrCandFiles = array();
        if(!empty($arrCandProfiles)){
            foreach($arrCandProfiles as $candProfileId){
                $dateitypen = array($this->extensions);
                $cvUploadPath = $this->getCVUploadFolder($candProfileId->cand_profile_id);
                $cvFiles = scandir($cvUploadPath, 0);
                foreach($cvFiles as $cvFile) {
                    $cvFileinfos = pathinfo($cvUploadPath. $cvFile);
                    if($cvFile != "." && $cvFile != ".." && $cvFileinfos['basename']) {
                        if(in_array($cvFileinfos['extension'], $dateitypen)) {
                            unset($cvFile);
                        }else{
                            $fileMd5Key = md5(base64_encode(file_get_contents($cvUploadPath . $cvFile)));
                            $cvFileinfos['file_type'] = 14;
                            $cvFileinfos['file_md5_key'] = $fileMd5Key;
                            $cvFileinfos['file_path'] = $cvUploadPath . $cvFile;

                            $arrCandFiles[] = $cvFileinfos;
                        }
                    }
                }
                unset($cvFiles);
                $attachmentPath = $this->getAttachementFolder($candProfileId->cand_profile_id);
                $attachmentFiles = scandir($attachmentPath, 0);
                foreach($attachmentFiles as $attachmentFile){ 
                    $attachmentFileinfos = pathinfo($attachmentPath  . $attachmentFile);
                    if($attachmentFile != "." && $attachmentFile != ".." && $attachmentFileinfos['basename']) {
                        if(in_array($attachmentFileinfos['extension'], $dateitypen)) {
                            unset($attachmentFile);
                        }else{
                            $fileMd5Key = md5(base64_encode(file_get_contents($attachmentPath . $attachmentFile)));
                            $attachmentFileinfos['file_type'] = 6;
                            $attachmentFileinfos['file_md5_key'] = $fileMd5Key;
                            $attachmentFileinfos['file_path'] = $attachmentPath . $attachmentFile;

                            $arrCandFiles[] = $attachmentFileinfos;
                        }
                    }
                }
                unset($attachmentFiles);
            }
        }
        return $arrCandFiles;
    }
    
    public function getFileContent($filePath){
        if(empty($filePath)){ return false; }
        
        $fileExists = file_exists($filePath);
        
        if($fileExists){
            $fileInfo = pathinfo($filePath);
            $fileInfo['file_content'] = base64_encode(file_get_contents($filePath));
            return $fileInfo;
        }
    }

    private function checkFileType($filename) {
       $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if (in_array($file_ext, $this->extensions) === false) {
            return false;
        }
        return true;
    }

    public function vac_application(){
        require_once 'vac_application.php';
        return $this->hasMany('vac_application');
    }   
    public function cand_address(){
        require_once 'cand_address.php';
        return $this->hasMany('cand_address');
    }
    public function cand_social(){
        require_once 'cand_social.php';
        return $this->hasMany('cand_social');
    }
    public function rel_email(){
        require_once 'rel_email.php';
        return $this->hasMany('rel_email');
    }
    public function rel_phone_number(){
        require_once 'rel_phone_number.php';
        return $this->hasMany('rel_phone_number');
    }
    public function cand_user(){
        require_once 'cand_user.php';
        return $this->belongsTo('cand_user','cand_user_id');
    }
    public function value_available_from(){
        require_once 'value_available_from.php';
        return $this->belongsTo('value_available_from','available_from_id');
    }
}