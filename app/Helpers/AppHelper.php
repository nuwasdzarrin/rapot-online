<?php
namespace App\Helpers;
use App\kkm;

class AppHelper {
    public static function getPredikat($na)
    {

      $kkm = kkm::where('id', 1) -> first();
         $predikat = '';

         // Jika semua nilai kd adalah 100, maka total na nya adalah 200
         if ($na == 200) {
             $predikat = 'A';
         }

         // Pred 1 adalah nilai max

         if($na >= $kkm->predA2 && $na <= $kkm->predA1) {
             $predikat = 'A';
            //echo $na;

         } elseif($na >= $kkm->predB2 && $na <= $kkm->predB1) {
             $predikat = 'B';
            //echo $na;

         } elseif($na >= $kkm->predC2 && $na <= $kkm->predC1) {
             $predikat = 'C';
            //echo $na;

         } elseif($na >= $kkm->preD2 && $na <= $kkm->predD1) {
             $predikat = 'D';
            //echo $na;
         }

         //echo $na;
         return $predikat;

    }
}

// Backup this file

/**
* <?php
* namespace App\Helpers;
* use App\kkm;
*
* class AppHelper {
*     public static function getPredikat($na)
*     {
*
*       $kkm = kkm::where('id', 1) -> first();
*         $predikat = null;
*
*         // Pred 1 adalah nilai max
*
*         if($na >= $kkm->predA2 && $na <= $kkm->predA1) {
*             $predikat = 'A';
*
*         } elseif($na >= $kkm->predB2 && $na <= $kkm->predB1) {
*             $predikat = 'B';
*
*         } elseif($na >= $kkm->predC2 && $na <= $kkm->predC1) {
*             $predikat = 'C';
*
*         } elseif($na >= $kkm->preD2 && $na <= $kkm->predD1) {
*             $predikat = 'D';
*         }
*
*         return $predikat;
*     }
* }
*
*/
