<?php
/**
 * Request 
 *
 * Request allows you to set $_POST and $_GET values into an object, it also allows you to validate incominging $_REQUEST values
 *
 * Usage: 
 * // Where $_POST = array( 'email' => 'ron@darby.co.za', 'first_name'=>'Ron', 'last_name'=>'Darby', 'ip'=>'192.168.1.100' );
 * $post = new Request( $_POST );
 * echo $post->email;
 * echo $post->first_name;
 * echo $post->last_name;
 * echo $post->ip;
 *
 * // Check Variables
 * $fields = array(
 *      'email' => array( 'required', 'email' ),
 *      'first_name' => array( 'required', 'name', array( 'maxlength', '25' ) ),
 *      'last_name' => array( 'required', 'name', array( 'minlength', '5' ) ),
 *      'ip' => array( 'ip' )
 * );
 *
 * $fieldNames = array(
 *      'email' => 'Email Address',
 *      'first_name' => 'First Name',
 *      'last_name' => 'Surname',
 *      'ip' => 'IP Address'
 * );
 *
 * $data = $post->checkVars( $fields, $errorResults, $fieldNames );
 *
 * if( count( $errorResults ) )
 * {
 *      // The form did no validate
 *      print_r( $errorResults );
 * }
 * else
 * {
 *      // All fields validated 
 *      print_r( $data );
 * }
 *
 * // $_GET works the same as post
 * $get = Request( $_GET );
 *
 * // Available validations
 *
 * 'required' string
 * 'alpha' string
 * 'alphanumeric' string
 * 'alphanumericextended'
 * 'boolean' string
 * 'currency' string
 * 'date' string
 * 'dateshort' string
 * 'time' string
 * 'datetime' string
 * 'decimal' string
 * 'email' string
 * 'equal' array
 * 'length' array
 * 'maxlength' array
 * 'maxamount' array
 * 'minlength' array
 * 'name' string
 * 'negative' string
 * 'numeric' string
 * 'numericextended' string
 * 'positive' string
 * 'regex' array
 * 'url' string
 * 'mac' string
 * 'ip' string
 * 'hostname' string
 * 'values' array with arguments comma seperated list array( 'colors' => array( 'values', 'blue,green,red') )
 * 'not_values' array with arguments comma seperated list array( 'car' => array( 'not_values', 'BMW,Fiat,Seat') )
 * 'contains' array with arguments comma seperated list array( 'profession' => array( 'contains', 'maler,gipser,bau') )
 * 'not_contains' array with arguments comma seperated list array( 'profession' => array( 'not_contains', 'maler,gipser,bau') )
 *
 * 
 * @date    2014-04-30
 * @copyright Ron Darby ron@rondarby.co.za
 * @author  Ron Darby ron@darby.co.za
 */
class Request{
    private $vars = array();
    private $array = array();

    public function __construct($type=null){
        if(!empty($type)){
            foreach($type as $key=>$val){
                $this->$key = $this->clean($val);            
            }
            $this->array = $type;
        }
    }

    public function __set($index, $value){
        $this->vars[$index] = $value;
    }

    public function __get($index){
        return isset($this->vars[$index]) ? $this->vars[$index] : null;       
    }

    public function __isset($index){
        return isset($this->vars[$index]) ? true : false;
    }

    public function __unset($index){
        unset($this->vars[$index]);
    }

    /**
     * check the vars fields if are valid
     * @param array $fields format validation for each field
     * @param array $error the error array
     * @param array $fieldNames the real field name
     * @return array return the data with the fields validated and cleaned
     */
    public function checkVars(array $fields, &$error, array $fieldNames=array()){
        $result = array();
        foreach( $fields as $field => $validations){            
            $fieldNames[$field] = !isset($fieldNames[$field]) ? $field : $fieldNames[$field];
            $result[$field] = $this->$field;

            foreach( $validations as $entry){
                if(is_array($entry)){
                    $test = $entry[0];
                    $arg = $entry[1];
                }else{ $test = $entry; }

                $res = false;
                // Check the first set of validations
                switch($test){
                    case 'required':
                        $res = !empty($result[$field]);
                        if(!$res){ $error[$field][] = sprintf(ERROR_RequiredField,$fieldNames[$field]); }
                        break;
                    default:
                        // if the field is not a required field, ignore when is empty
                        if(empty($result[$field])){ continue 2; }
                        break;
                }

                switch($test){
                    case 'alpha':
                        $res = preg_match('/^[a-zA-Z ]*$/', $result[$field]) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_alpha,$fieldNames[$field]); }
                        break;

                    case 'alphanumeric':
                        $res = preg_match('/^[a-zA-Z0-9_-]*$/', $result[$field]) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_alphanumeric,$fieldNames[$field]); }
                        break;
                    
                    case 'alphanumericextended': // a bis Z (A Z) 0 bis 9 leerzeichen _ - /
                        $res = preg_match('/^[a-zA-Z0-9-\(\).,_\/ ]*$/', $result[$field]) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_alphanumericextended,$fieldNames[$field]); }
                        break;    

                    case 'boolean':
                        $res = preg_match('/^[01]{1}$/', $result[$field]) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_boolean,$fieldNames[$field]); }
                        break;

                    case 'currency':
                        $result[$field] = str_replace(',', '', $result[$field]);
                        $res = preg_match('/^\d+[.]?\d{0,2}$/', $result[$field]) == 1 ? true : false;
                        if (!$res){
                            $error[$field][] = sprintf(ERROR_currency,$fieldNames[$field]);
                        }else{
                            $result[$field] = number_format($result[$field], 2, '.', '');
                        }
                        break;

                    // 2011-01-12
                    case 'date':
                    case 'dateshort':
                        $res = preg_match('/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/', $result[$field]) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_date,$fieldNames[$field]); }
                        break;
                        
                    case 'time':
                        $res = preg_match('/^[0-9]{2,3}\:[0-9]{2}\:[0-9]{2}$/', $result[$field]) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_time,$fieldNames[$field]); }
                        break;
                        
                    case 'datetime':
                        // 1987-02-08 00:00:00 = valid (don't work with miliseconds) 1987-02-08 00:00:00.000 = not valid
                        $res = preg_match('/^(?=\d)(?:(?!(?:1582(?:\.|-|\/)10(?:\.|-|\/)(?:0?[5-9]|1[0-4]))|(?:1752(?:\.|-|\/)0?9(?:\.|-|\/)(?:0?[3-9]|1[0-3])))(?=(?:(?!000[04]|(?:(?:1[^0-6]|[2468][^048]|[3579][^26])00))(?:(?:\d\d)(?:[02468][048]|[13579][26]))\D0?2\D29)|(?:\d{4}\D(?!(?:0?[2469]|11)\D31)(?!0?2(?:\.|-|\/)(?:29|30))))(\d{4})([-\/.])(0?\d|1[012])\2((?!00)[012]?\d|3[01])(?:$|(?=\x20\d)\x20))?((?:(?:0?[1-9]|1[012])(?::[0-5]\d){0,2}(?:\x20[aApP][mM]))|(?:[01]\d|2[0-3])(?::[0-5]\d){1,2})?$/', $result[$field] ) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_datetime,$fieldNames[$field]); }
                        break;
                        
                    case 'decimal':
                        $res = preg_match('/^[+-]?\d+[.]?\d*$/', $result[$field]) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_decimal,$fieldNames[$field]); }
                        break;

                    case 'email':                                                   
                        $res = preg_match('/^[äöüÄÖÜa-zA-Z0-9\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~]+[\.]*([äöüÄÖÜa-zA-Z0-9\.\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~]+)@[äöüÄÖÜa-zA-Z0-9\.\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~]+[\.]*([äöüÄÖÜa-zA-Z0-9\.\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~]+)\.[a-zA-Z]{2,}$/i', $result[$field]) === 1 ? true : false;
                        if(!$res){ 
                            $error[$field][] = ERROR_invalidEmail; 
                        }else{
                            if(!Toolkit::contains($result[$field], '@planova.ch') && !Toolkit::contains($result[$field], '@ahapersonal.ch') && !Toolkit::contains($result[$field], '@brefis.ch')){
                                if (!function_exists('checkdnsrr')){
                                    function checkdnsrr($host, $type){
                                        @exec('nslookup -type=' . $type . ' ' . $host, $output);

                                        foreach ($output as $line){
                                            if (preg_match('/^' . $host . '/i', $line)){
                                                return true;
                                            }
                                        }
                                        return false;
                                    }
                                }

                                $host = substr(strrchr($result[$field], '@'), 1);
                                if (checkdnsrr($host, 'MX') === false || checkdnsrr($host, 'A') === false){
                                    $error[$field][] = ERROR_invalidEmail;
                                }
                            }
                        }
                        break;

                    case 'equal':
                        $res = $result[$field] == $result[$arg] ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_equal,$fieldNames[$field],$fieldNames[$arg]); }
                        break;

                    case 'length':
                        $res = strlen($result[$field]) == $arg ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_length,$fieldNames[$field],$arg); }
                        break;
                     
                    //This is the maximum amount allowed to be enterred as an integer
                    case 'maxamount':
                        $res = preg_match('/^\d*$/', $result[$field]) == 1 ? true : false;
                        if($res){
                            if ($result[$field] >= $arg){ $error[$field][] = sprintf(ERROR_maxamount,$fieldNames[$field],$arg); }
                        }else{
                            $error[$field][] = sprintf(ERROR_numeric,$fieldNames[$field]);
                        }
                        break;    

                    case 'maxlength':
                        $res = strlen($result[$field]) <= $arg ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_maxlength,$fieldNames[$field],$arg); }
                        break;

                    case 'minlength':
                        $res = strlen($result[$field]) >= $arg ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_minlength,$fieldNames[$field],$arg-1); }
                        break;
                    
                    case 'name':
                        $res = preg_match("/^[a-zA-Z '-]+$/", $result[$field]) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_name,$fieldNames[$field]); }
                        break;
                        
                    case 'negative':
                        $res = floatval($result[$field]) <= 0 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_negative,$fieldNames[$field]); }
                        break;

                    case 'numeric':
                        if (!Toolkit::is_numeric($result[$field])){ $error[$field][] = sprintf(ERROR_numeric,$fieldNames[$field]); }
                        break;
                        
                    //This will allow numerics seperated by dashes and forward slashes
                    case 'numericextended':
                        $res = preg_match('/^[0-9-.\/]*$/', $result[$field]) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_numericextended,$fieldNames[$field]); }
                        break;

                    case 'positive':
                        $res = floatval($result[$field])  >= 0 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_positive,$fieldNames[$field]); }
                        break;

                    case 'regex':
                        $res = preg_match($arg, $result[$field]);
                        if ($res === 0){
                            $error[$field][] = sprintf(ERROR_invalidFormat,$fieldNames[$field]);
                        }else if($res === false){
                            $error[$field][] = ERROR_RegEx;
                        }
                        break;
                        
                    case 'url':
                        $url = $result[$field];
                        if(empty($result[$field])){
                            $error[$field][] = sprintf(ERROR_url,$url);
                        }else{
                            $this->cleanUrlForDnsCheck($url);
                            if (!preg_match('/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', $url)){
                                $error[$field][] = sprintf(ERROR_url,$url);
                            }else{
                                $resultDns = dns_get_record($url);
                                if(empty($resultDns)){
                                    $error[$field][] = sprintf(ERROR_url,$url);
                                }
                            }
                        }
                        $result[$field] = $url;
                        break;
                        
                    case 'mac':
                        // MAC Address
                        // Ensures MAC address is well formated and only hex characters
                        // eg. 12:34:56:78:90:AB
                        $res = preg_match('/^[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}$/i', $result[$field]) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_mac,$fieldNames[$field]); }
                        break;
                        
                    case 'ip':
                        // IP Address
                        // Ensures IP number are constrained to 0..255.
                        // eg. 123.123.123.123
                        $res = preg_match('/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/i', $result[$field]) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_ip,$fieldNames[$field]); }
                        break;
                        
                    case 'hostname':
                        // Hostname
                        $regex =
                              '/^'                              // Start
                            . '(([0-9]{1,3}\.){3}[0-9]{1,3})'   // IP (eg. 199.194.52.184)
                            . '|'                               // Allows either IP or domain
                            . "(([0-9a-z_!~*'()-]+\.)+"         // Initial domain part
                            . '[a-z]{2,6})'                     // TLD (eg. .com or .museum)
                            . "$/i";                            // End
                        $res = preg_match($regex, $result[$field]) == 1 ? true : false;
                        if (!$res){ $error[$field][] = sprintf(ERROR_hostname, $fieldNames[$field]); }
                        break;
                        
                    case 'values':
                        $res = in_array($result[$field], explode(',', $arg));
                        if (!$res){ $error[$field][] = sprintf(ERROR_values, $fieldNames[$field], $arg); }
                        break;
                        
                    case 'not_values':
                        $res = in_array($result[$field], explode(',', $arg));
                        if ($res){ $error[$field][] = sprintf(ERROR_invalidFormat, $fieldNames[$field]); }
                        break;    
                        
                    case 'contains':
                        $values = explode(',', $arg);
                        $res = false;
                        $tempString = mb_strtolower($result[$field], 'UTF-8');
                        foreach ($values as $value){
                            if($this->contains($tempString, $value)){
                                $res = true;
                                continue;
                            }
                        }
                        if (!$res){ $error[$field][] = sprintf(ERROR_contains, $fieldNames[$field], $arg); }
                        break;    
                        
                    case 'not_contains':
                        $not_values = explode(',', $arg);
                        $res = true;
                        $tempString = mb_strtolower($result[$field], 'UTF-8');
                        foreach ($not_values as $value){
                            if($this->contains($tempString, $value)){
                                $res = false;
                                continue;
                            }
                        }
                        if (!$res){ $error[$field][] = sprintf(ERROR_invalidFormat, $fieldNames[$field]); }
                        break;
                    default:
                    break;
                }
            }
        }
        return $result ;
    }
    
    /**
     * check if the string contains the needle string
     * @param string $str string to check
     * @param string $needle string to find
     * @return boolean true = string found; false = string not found;
     */
    public function contains($str, $needle){
        return (strpos($str, $needle) !== false);
    }
    
    /**
     * clean a url for the dns check
     * @param string $url
     */
    public function cleanUrlForDnsCheck(&$url){
        $url = trim($url);
        if ($this->contains($url, 'http')){
            $url = str_replace('http://', '', $url);
            $url = str_replace('https://', '', $url);
        }
        if ($this->contains($url, '/')){
            $url = substr($url, 0, strpos($url, '/'));            
        }
        if ($this->contains($url, '?')){
            $url = substr($url, 0, strpos($url, '?'));            
        }
        if ($this->contains($url, ',')){
            $url = str_replace(',', '.', $url);
        }
        if ($this->contains($url, ' ')){
            $url = str_replace(' ', '', $url);
        }
        if ($this->contains($url, 'wwww.') !== false){
            $url = str_replace('wwww.', 'www.', $url);
        }
        if ($this->contains($url, 'www.') === false && $this->contains($url, 'www') === false){
            $url = 'www.' . $url;
        } else if ($this->contains($url, 'www.') === false && $this->contains($url, 'www') === true){
            $url = str_replace('www', 'www.', $url);
        }
    }

    public function clean($var){
        if(is_array($var)){
            foreach($var as $k=>$v){
                $v = trim($v);
                $var[$k] = filter_var($v, FILTER_SANITIZE_MAGIC_QUOTES);
            }
        }else{
            $var = trim($var);
            $var = filter_var($var, FILTER_SANITIZE_MAGIC_QUOTES);
        }
        return $var;
    }
}