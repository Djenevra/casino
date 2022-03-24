<?php
namespace app\services\prizes;

interface UnlimitedPrizeInterface {

    /**
     * Checks total of prize.
     * @return string
     */
    public function title ();

    /**
     * @return float
     */
    public function getPrize ();
}
