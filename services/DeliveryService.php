<?php

namespace app\services;

use app\models\Delivery;

class DeliveryService
{

    /**
     * Creates delivery.
     * @params array $delivery
     * return bool if delivery created
     */

    public function createDelivery($delivery): bool
    {
        $model = new Delivery($delivery);
        return $model->save();
    }
}
