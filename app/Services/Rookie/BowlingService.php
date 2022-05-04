<?php

namespace App\Services\Rookie;

class BowlingService
{
    public function getBowlingList(array $_aInput)
    {
        $aResult = [];
        foreach ($_aInput as $key => $aInput) {
            $aScore[$key] = $aInput[0] + $aInput[1];
            
            if ($aInput[0] == 10) {             //判斷是否為strike
                $aResult[$key] = $aResult[$key-1] + $aScore[$key] + $_aInput[$key+1][0]+$_aInput[$key+1][1];
            }
            elseif ($aScore[$key] == 10) {      //判斷是否為spare
                if (count($aScore) == 1) {      //判斷是否為第一局
                    $aResult[$key] = $aScore[$key] + $_aInput[$key+1][0];
                }else{
                    $aResult[$key] = $aResult[$key-1] + $aScore[$key] + $_aInput[$key+1][0];
                }
            }
            elseif ($aScore[$key] != 10) {      //一般情況
                if (count($aScore) == 1) {      //判斷是否為第一局
                    $aResult[$key] = $aScore[$key];
                }else{
                    $aResult[$key] = $aResult[$key-1] + $aScore[$key]; 
                }
            }
        }
        return $aResult;

    }

}
