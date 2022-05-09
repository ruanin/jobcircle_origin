<?php
require_once '../app/models/value_country.php';
/**
 * Description of helper_phone_lib
 *
 * @author aschaerer
 */
class helper_phone_lib {
    private $_countyObj;
    
    function __construct() {
        $this->_countyObj = new value_country();
    }
    
    public function isPhoneNumberValidFromCountryCode($phoneNumber, $countryCode){
        $countryId = $this->_countyObj->getCountryIdFromCountryCode($countryCode);
        return $this->_isPhoneNumberValid($phoneNumber, $countryId);
    }
    
    public function isPhoneNumberValidFromCountryId($phoneNumber, $countryId){
        return $this->_isPhoneNumberValid($phoneNumber, $countryId);
    }
    
    private function _isPhoneNumberValid($phoneNumber, $countryId){
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        try{
            $countryCode = $this->_countyObj->getCountryCode($countryId);
            $numberProto = $phoneUtil->parse($phoneNumber, $countryCode);
            $regionCode = $phoneUtil->getRegionCodeForNumber($numberProto);
            $isValid = $phoneUtil->isValidNumber($numberProto);
            $isValidFromRegion = $phoneUtil->isValidNumberForRegion($numberProto, $regionCode);
            $countryIdFromRegionCode = $this->_countyObj->getCountryIdFromCountryCode($regionCode);
            if($countryIdFromRegionCode !== false && $countryIdFromRegionCode != $countryId){
                $countryId = $countryIdFromRegionCode;
            }
            $numberTyp = $phoneUtil->getNumberType($numberProto);
            $isMobile = false;
            if($numberTyp === \libphonenumber\PhoneNumberType::MOBILE){
                $isMobile = true;
            }
            $countryCodeForRegion = $phoneUtil->getCountryCodeForRegion($regionCode);
            $isZero = $phoneUtil->isLeadingZeroPossible($countryCodeForRegion);
            // Format type
            $nationalFormat = $phoneUtil->format($numberProto, \libphonenumber\PhoneNumberFormat::NATIONAL);
            $nationalFormat = Toolkit::cleanPhoneNumber($nationalFormat);
            $e164Format = $phoneUtil->format($numberProto, \libphonenumber\PhoneNumberFormat::E164);
            
            return array(
                'phoneNumberObj' => $numberProto,
                'countryCode' => $regionCode,
                'isValidNumber' => $isValid,
                'isValidFromCountry' => $isValidFromRegion,
                'countryId' => $countryId,
                'numberTyp' => $numberTyp,
                'isMobile' => $isMobile,
                'isZero' => $isZero,
                'nationalNumber' => $numberProto->getNationalNumber(),
                'nationalFormat' => $nationalFormat,
                'e164Format'=> $e164Format
            );
        }catch (\libphonenumber\NumberParseException $e){
            $errorType = $e->getErrorType();
            return array('error' => $this->getErrorMsgFromErrorType($errorType));
        }
    }
    
    public function getErrorMsgFromErrorType($errorType){
        switch ($errorType){
            case \libphonenumber\NumberParseException::INVALID_COUNTRY_CODE:
                return 'Es fehlt oder ist ein ungültiger default Länder Code mit gegeben worden';
            case \libphonenumber\NumberParseException::NOT_A_NUMBER:
                return 'Die mitgelieferte Zeichenkette ist nicht eine Telefonnummer';
            case \libphonenumber\NumberParseException::TOO_LONG:
                return 'Diese Zeichenkette ist zu lang, als jede gültige Telefonnummer haben könnte';
            case \libphonenumber\NumberParseException::TOO_SHORT_AFTER_IDD:
                return 'Dies zeigt die Zeichenkette beginnt mit einer internationalen Vorwahl, danach aber hat sie zu wenige Ziffern als jede gültige Telefonnummer (inklusive Ländervorwahl)';
            case \libphonenumber\NumberParseException::TOO_SHORT_NSN:
                return 'Dies zeigt die Zeichenkette, nach dem der Land Code entfernt wurde, waren es zu wenige Ziffern als jede gültige Telefonnummer haben könnte';
            default:
                return 'Ein Fehler ist aufgetreten';
        }
    }
}
