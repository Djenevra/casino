<?php
namespace app\services\prizes;

interface LimitedPrizeInterface {

//    /**
//     * @return float
//     */
//    public function total ();

    /**
     * @return float
     */
    public function getPrize ();
}
