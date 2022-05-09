<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClassToolkit
 *
 * @author tsiva
 */
class Toolkit {

    public static function getMonthName($month) {
        $monate = array(
            1 => "Januar",
            2 => "Februar",
            3 => "März",
            4 => "April",
            5 => "Mai",
            6 => "Juni",
            7 => "Juli",
            8 => "August",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Dezember");

        if (is_numeric($month) && isset($monate[$month])) {
            return $monate[$month];
        }

        return false;
    }

    public static function shortText($string, $lenght) {

        if (strlen($string) > $lenght) {
            $string = substr($string, 0, $lenght) . "...";
            $string_ende = strrchr($string, " ");
            $string = str_replace($string_ende, " ...", $string);
        }

        return $string;
    }

    public static function is_numeric($string) {
        return preg_match('/^\d*$/', $string) == 1 ? true : false;
    }

    public static function cleanPhoneNumber($number, $length = 0) {
        $number = trim($number);
        // filter all nonnumeric chars
        $newNumber = '';
        for ($i = 0; $i < strlen($number); $i++) {
            $c = $number{$i};
            if (preg_match('/\+|[0-9]/', $c)) {
                $newNumber .= $c;
            }
        }

        if (!empty($length) && $length > 0 && strlen($newNumber) > $length) {
            $newNumber = substr($newNumber, -$length);
        }

        return $newNumber;
    }
    
    public static function contains($str, $needle){
        return (strpos($str, $needle) !== false);
    }

    public static function getDepartmentFromZip($zip) {

        $zip = trim($zip);
        $zip = (int) $zip;

        // setze die URL und andere Optionen
        // $url = 'http://192.168.114.239/dev/alain/manage/manage_misc_js.php'; // dev
        $url = 'http://psr.hrcockpit.com/manage_misc_js.php'; // Live
        $post = array('task' => 'getDepartmentJobCircleIDForZip', 'country_id' => '1', 'customer_id' => '1000', 'zip' => $zip);

        $department = Toolkit::curl_post($url, $post);
        $department = trim($department, '"');
        if (empty($department)) {
            $department = 'Frei Gebiet';
        }
        return $department;
    }
    
    public static function curl_post($url, array $post = NULL, array $options = array()){ 
    $defaults = array( 
        CURLOPT_ENCODING => 'UTF-8',
        CURLOPT_POST => 1, 
        CURLOPT_HEADER => 0, 
        CURLOPT_URL => $url, 
        CURLOPT_FRESH_CONNECT => 1, 
        CURLOPT_RETURNTRANSFER => 1, 
        CURLOPT_FORBID_REUSE => 1, 
        CURLOPT_TIMEOUT => 4, 
        CURLOPT_POSTFIELDS => http_build_query($post) 
    ); 

    $ch = curl_init(); 
    curl_setopt_array($ch, ($options + $defaults)); 
    if($result = curl_exec($ch) === false)
    {
        echo 'Curl error: ' . curl_error($ch);
    } 
    curl_close($ch); 
    return $result; 
} 

    public static function getPost($key, $default = null) {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }
    
    public static function getVar($key, $default = null){
        if(isset($_POST[$key])){
            return $_POST[$key];
        }else if(isset($_GET[$key])){
            return $_GET[$key];
        }
        
        return $default;
    }
    
    /**
    * This function clean the firstname or lastname
    *
    * @param $stringToClean is the string to be clean
    *
    */
   public static function cleanName($stringToClean) {
        $regex = '/[0-9\_\.\*\!\?\+\%\@\(\)\,]/';
        return Toolkit::cleanStringWithRegex($stringToClean, $regex, TRUE, TRUE);
   }
    
    /**
    * This function clean the string with the regex
    *
    * @param $stringToClean is the string to be clean
    * @param $regex the regex clean the string
    * @param $firstLetterUpperCase the first letter is upper case when = true
    * @param $only5WhiteSpace permit only 5 white space
    *
    */
    public static function cleanStringWithRegex($stringToClean, $regex, $firstLetterUpperCase = FALSE, $only5WhiteSpace = FALSE) {
        if (!empty($stringToClean)) {
            $stringToClean = trim($stringToClean);

            // regex Filter **********************************************************************
            if (!empty($regex)) {
                $stringToClean = preg_replace($regex, '', $stringToClean);
                $stringToClean = trim($stringToClean);
            }
            // ***********************************************************************************
            // clean the first and the last letter ***********************************************
            $arrProhibetedForFirstAndLastLetter = array('-');

            $stringToClean = trim($stringToClean, implode(',', $arrProhibetedForFirstAndLastLetter));
            // ***********************************************************************************

            $tempString = '';

            // only 5 white space **********************************************************
            if ($only5WhiteSpace) {
                // for the hyphen (-)
                $firstHyphen = TRUE;

                preg_match_all('/[\s]/', $stringToClean, $arrResult);
                $tempString = '';
                $whiteSpaceCount = 1;
                if (is_array($arrResult) && count($arrResult[0] > 0)) {
                    $previousLetter = '';
                    for ($i = 0; $i < strlen($stringToClean); $i++) {
                        if ($whiteSpaceCount <= 5) {
                            $only5WhiteSpace = TRUE;
                        }

                        if ($stringToClean[$i] === '-' && $firstHyphen) {
                            $only5WhiteSpace = TRUE;
                        }

                        if ($only5WhiteSpace && $stringToClean[$i] === ' ' && $previousLetter != ' ') {
                            $tempString .= ' ';
                            $only5WhiteSpace = FALSE;
                            $whiteSpaceCount++;
                        } else {
                            if ($stringToClean[$i] !== ' ') {
                                if ($stringToClean[$i] === '-') {
                                    if ($firstHyphen) {
                                        $tempString .= $stringToClean[$i];
                                        $firstHyphen = FALSE;
                                    } elseif ($previousLetter !== '-') {
                                        $tempString .= ' ';
                                    }
                                } else {
                                    $tempString .= $stringToClean[$i];
                                }
                            }
                        }
                        $previousLetter = $stringToClean[$i];
                    }
                }

                $stringToClean = (!empty($tempString)) ? $tempString : $stringToClean;
            }
            // *****************************************************************************
            // first letter upper case *****************************************************
            // after the bank ( ) and hyphen (-) make the next letter upper
            if ($firstLetterUpperCase) {
                $stringToClean = mb_strtolower($stringToClean, 'UTF-8');
                $tempString = '';
                $nextOneUpper = TRUE;   // first letter is always upper case 

                for ($i = 0; $i < strlen($stringToClean); $i++) {
                    $tempStC = mb_substr($stringToClean, $i, 1, 'UTF-8');

                    if ($tempStC === ' ' || $tempStC === '-') {
                        $nextOneUpper = TRUE;
                        $tempString .= $tempStC;
                    } else {
                        if ($nextOneUpper) {
                            $tempStC = mb_strtoupper($tempStC, 'UTF-8');
                            $nextOneUpper = FALSE;
                        }
                        $tempString .= $tempStC;
                    }
                }

                $stringToClean = (!empty($tempString)) ? $tempString : $stringToClean;
            }
            // *****************************************************************************
        }

        return $stringToClean;
    }
    
    # AGE CALCULATOR
    # Author: Farhan Wazir
    # Email: seejee1@gmail.com
    #
    # License: http://www.gnu.org/licenses/gpl-3.0.en.html
    # The GNU General Public License (GNU GPL or GPL) is the most widely used free software license, 
    # which guarantees end users (individuals, organizations, companies) the freedoms to run, study, 
    # share (copy), and modify the software.
    #
    public static function ageCalculator(DateTime $born, $format = 'full') {
        //set current date
        $now = new DateTime;
        //get differ between born date and current date
        $diff = $now->diff($born);

        $total_days = $diff->days;
        $total_months = ($diff->y * 12) + $diff->m;
        $total_years = $diff->y;
        //setup of localization if you want to use another language, PHP will translate it
        setlocale(LC_ALL, 'de_CH');

        //preparing format as on requested by second parameter
        switch ($format) {
            case 'full':
                $age = ($d = $diff->d) ? ' and ' . $d . ngettext(" day", " days", $d) : '';
                $age = ($m = $diff->m) ? ($age ? ', ' : ' and ') . $m . ngettext(" month", " months", $m) . $age : $age;
                $age = ($y = $diff->y) ? $y . ngettext(" year", " years", $y) . $age : $age;
                break;
            case 'M':
                $age = $total_months . ' ' . ngettext(" month", " months", $total_months);
                break;
            case 'D':
                $age = $total_days . ' ' . ngettext(" day", " days", $total_days);
                break;
            case 'Y':
                $age = $total_years . ' ' . ngettext(" year", " years", $total_years);
                break;
            case 'm':
                $age = $total_months;
                break;
            case 'd':
                $age = $total_days;
                break;
            case 'y':
                $age = $total_years;
                break;
            default:
                $age = str_replace(array('%y', '%m', '%d'),
                        array($diff->y, $diff->m, $diff->d),
                        str_replace(array('%Y', '%M', '%D'),
                                array($diff->y . ngettext(" year", " years", $diff->y), $diff->m . ngettext(" month", " months", $diff->m), $diff->d . ngettext(" day", " days", $diff->d)),
                                $format));
                break;
        }
        return $age;
    }
    
        public static function checkCandFieldsForm($arrInputFields, $checkRequiredFields = true) {
        if (empty($arrInputFields) || !is_array($arrInputFields)) {
           
            return false;
        }
        $arrError = [];
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

        $regex = '/[0-9\_\.\*\!\?\+\%\@\(\)\,]/';
        $regexAdress = '/[\_\.\*\!\?\+\%\@\(\)\,]/';
        if($checkRequiredFields == true){
            if ((empty($arrInputFields['inputFirstname']) || empty($arrInputFields['inputLastname']))) {
                $fieldName = "";
                if (empty($arrInputFields['inputLastname'])) {
                    $fieldName = "Nachname";
                } elseif (empty($arrInputFields['inputFirstname'])) {
                    $fieldName = "Vorname";
                } 
                $arrError[] = "Das Feld " . $fieldName . " darf nicht leer sein.";
            }
        }

        if (!empty($arrInputFields['inputFirstname'])) {
            preg_match($regex, $arrInputFields['inputFirstname'], $arrMatches);
            if (!empty($arrMatches)) {
                $arrError[] = 'Der Vorname enthält nicht erlaubte Zeichen.';
            }
        }

        if (!empty($arrInputFields['inputLastname'])) {
            preg_match($regex, $arrInputFields['inputLastname'], $arrMatches);
            if (!empty($arrMatches)) {
                $arrError[] = 'Der Name enthält nicht erlaubte Zeichen.';
            }
        }

        if (!empty($arrInputFields['inputAdress'])) {
           preg_match($regexAdress, $arrInputFields['inputAdress'], $arrMatches);
            if (!empty($arrMatches)) {
                $arrError[] = 'Der Name enthält nicht erlaubte Zeichen.';
            }
        }
        
        if (!empty($arrInputFields['inputPLZ'])) {
            if (!is_numeric($arrInputFields['inputPLZ'])) {
                $error[] = 'Bitte Postleitzahl auswählen.';
            }
        }
        
        if (!empty($arrInputFields['inputLocation'])) {
             preg_match($regex, $arrInputFields['inputLocation'], $arrMatches);
            if (!empty($arrMatches)) {
                $arrError[] = 'Die Ortsangabe enthält nicht erlaubte Zeichen.';
            }
        }
        
        if (!empty($arrInputFields['inputPhone'])) {
            $isValid = Toolkit::isValidPhoneNumber($arrInputFields['inputPhone']);
            if ($isValid === false) {
                $arrError[] = 'Die Telefonnummer ist nicht gültig für die ausgewählte Vorwahl: ' . $arrInputFields['inputPhone'];
            }
        }

        if (!empty($arrInputFields['inputMobile'])) {
            $isValid = Toolkit::isValidPhoneNumber($arrInputFields['inputMobile']);
            if ($isValid === false) {
                $arrError[] = 'Die Telefonnummer ist nicht gültig für die ausgewählte Vorwahl: ' . $arrInputFields['inputMobile'];
            }
        }

        if (!empty($arrInputFields['inputInsurance'])) {
            $isAHVNumber = Toolkit::isAHVNumber($arrInputFields['inputInsurance']);
            if ($isAHVNumber === false) {
                $arrError[] = 'Die eingegebene AHV-Nummer ist ungültig: ' . $arrInputFields['inputInsurance'];
            }
        }

        return $arrError;
    }

    public static function checkCandFields($arrInputFields, $checkRequiredFields = true) {
        if (empty($arrInputFields) || !is_array($arrInputFields)) {
            return false;
        }
        $arrError = [];
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

        $regex = '/[0-9\_\.\*\!\?\+\%\@\(\)\,]/';
        if($checkRequiredFields == true){
            if ((empty($arrInputFields['inputBirthday']) || empty($arrInputFields['inputFirstname']) || 
                 empty($arrInputFields['inputLastname']))) {
                $fieldName = "";
                if (empty($arrInputFields['inputFirstname'])) {
                    $fieldName = "Vorname";
                } elseif (empty($arrInputFields['inputLastname'])) {
                    $fieldName = "Nachname";
                } elseif (empty($arrInputFields['inputBirthday'])) {
                    $fieldName = "Geburtsdatum";
                }
                $arrError[] = "Das Feld " . $fieldName . " darf nicht leer sein.";
            }
        }

        if (!empty($arrInputFields['inputFirstname'])) {
            preg_match($regex, $arrInputFields['inputFirstname'], $arrMatches);
            if (!empty($arrMatches)) {
                $arrError[] = 'Der Vorname enthält nicht erlaubte Zeichen.';
            }
        }

        if (!empty($arrInputFields['inputLastname'])) {
            preg_match($regex, $arrInputFields['inputLastname'], $arrMatches);
            if (!empty($arrMatches)) {
                $arrError[] = 'Der Name enthält nicht erlaubte Zeichen.';
            }
        }

        if (!empty($arrInputFields['inputBirthday'])) {
            $birthDateFormated = date('Y-m-d', strtotime($arrInputFields['inputBirthday']));
            $age = Toolkit::ageCalculator(new DateTime($birthDateFormated), 'y');
            if ($age < 16) {
                $arrError[] = "Das Mindestalter beträgt 16 Jahre.";
            }
        }
        
        if (!empty($arrInputFields['inputCountry'])) {
            if (!is_numeric($arrInputFields['inputCountry'])) {
                $error[] = 'Bitte Land auswählen.';
            }
        }
        
        if (!empty($arrInputFields['inputNationality'])) {
            if (!is_numeric($arrInputFields['inputNationality'])) {
                $error[] = 'Bitte Nationalität auswählen.';
            }
        }
        
        if (!empty($arrInputFields['inputPhone'])) {
            $isValid = Toolkit::isValidPhoneNumber($arrInputFields['inputPhone']);
            if ($isValid === false) {
                $arrError[] = 'Die Telefonnummer ist nicht gültig für die ausgewählte Vorwahl: ' . $arrInputFields['inputPhone'];
            }
        }

        if (!empty($arrInputFields['inputMobile'])) {
            $isValid = Toolkit::isValidPhoneNumber($arrInputFields['inputMobile']);
            if ($isValid === false) {
                $arrError[] = 'Die Telefonnummer ist nicht gültig für die ausgewählte Vorwahl: ' . $arrInputFields['inputMobile'];
            }
        }

        if (!empty($arrInputFields['inputLoginMobile'])) {
            $isValid = Toolkit::isValidPhoneNumber($arrInputFields['inputLoginMobile']);
            if ($isValid === false) {
                $arrError[] = 'Die Telefonnummer ist nicht gültig für die ausgewählte Vorwahl: ' . $arrInputFields['inputLoginMobile'];
            }
        }

        if (!empty($arrInputFields['inputEmail'])) {
            $result = preg_match('/^[äöüÄÖÜa-zA-Z0-9\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~]+[\.]*([äöüÄÖÜa-zA-Z0-9\.\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~]+)@[äöüÄÖÜa-zA-Z0-9\.\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~]+[\.]*([äöüÄÖÜa-zA-Z0-9\.\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~]+)\.[a-zA-Z]{2,}$/i', $arrInputFields['inputEmail']);
            if ($result === false) {
                $error[] = 'Die eingegebene E-Mail Adresse ist ungültig.';
            }
        }

        if (!empty($arrInputFields['inputLoginEmail'])) {
            $result = preg_match('/^[äöüÄÖÜa-zA-Z0-9\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~]+[\.]*([äöüÄÖÜa-zA-Z0-9\.\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~]+)@[äöüÄÖÜa-zA-Z0-9\.\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~]+[\.]*([äöüÄÖÜa-zA-Z0-9\.\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~]+)\.[a-zA-Z]{2,}$/i', $arrInputFields['inputLoginEmail']);
            if ($result === false) {
                $error[] = 'Die eingegebene E-Mail Adresse ist ungültig.';
            }
        }

        if (!empty($arrInputFields['inputAHVnumber'])) {
            $isAHVNumber = Toolkit::isAHVNumber($arrInputFields['inputAHVnumber']);
            if ($isAHVNumber === false) {
                $arrError[] = 'Die eingegebene AHV-Nummer ist ungültig: ' . $arrInputFields['inputAHVnumber'];
            }
        }

        return $arrError;
    }

    public static function isAHVNumber($ahvNumber){
        $check = false;
        if (preg_match("/^[0-9]{3}.[0-9]{4}.[0-9]{4}.[0-9]{2}$|^[0-9]{3}.[0-9]{2}.[0-9]{3}.[0-9]{3}$/", $ahvNumber) === 1){
            $check = true;
        }
        return $check;
    }
    
    public static function isValidPhoneNumber($phoneNumber){
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $arrPhoneNumber = $phoneUtil->parse($phoneNumber, 'CH');
        $isValid = $phoneUtil->isValidNumber($arrPhoneNumber);
        if($isValid === false) {
            return false;
        }
        return true;
    }
}
