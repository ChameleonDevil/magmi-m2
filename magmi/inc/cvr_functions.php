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
    public static function updateMissingDefaults(&$item){

        if(is_array($item)){
            if(CvR_Functions::keyExists('created_at', $item)){
                    $item['created_at'] = date('Y-m-d');
            }
        }
    }

    private static function keyExists($keyName, $arr){
        return array_key_exists($keyName, $arr);
    }
}