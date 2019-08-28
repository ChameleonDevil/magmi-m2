<?php 
/**
    <p>Class with helper functions to assist in handling product item updates when Magmi has to do updates/imports</p>

    <p>Author : Corné van Rooyen - August 2019</p>
*/

class CvR_Functions
{

    /**
     * Updates the product CSV item (column with values) by Reference.
     *
     * @param [array] $item
     * @return void
     */
    private static $_defaultFields = array();
    private static $INITIALIZED = FALSE;

    public static function updateMissingDefaults(&$item){

        if(is_array($item)){
                $defaults = self::getDefaultFields();

                foreach($defaults as $kKey => $kItem ){
                    $val = $kItem['value'];
                    $key = $kItem['key'];

                    self::_updateOnEmptyValue($item, $key, $val);
                }
        }
    }

    public static function getDefaultFields(){

        if(!self::$INITIALIZED){
            $defaults = array();

            array_push($defaults, ['key' => 'created_at', 'value' => date('Y-m-d')]);

            self::$_defaultFields = $defaults;
            self::$INITIALIZED = true;
        }

        return self::$_defaultFields;
    }

    private static function _keyExists($keyName, $arr){
        return array_key_exists($keyName, $arr);
    }

    private static function _keyExistsAndEmptyValue($keyName, $arr){
        $empty = false;

        if(self::_keyExists($keyName, $arr)){
            $empty = empty($item[$keyName]);
        }
        return $empty;
    }

    private static function _updateOnEmptyValue(&$arr, $keyName, $value){
        if(self::_keyExistsAndEmptyValue($keyName, $arr)){
            $arr[$keyName] = $value;
        }
    }
}