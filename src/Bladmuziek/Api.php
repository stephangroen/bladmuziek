<?php namespace Bladmuziek;

class Api extends \Picqer\Api\Client
{

    public function cancelPicklist($idpicklist)
    {
        $result = $this->sendRequest('/picklists/' . $idpicklist . '/cancel', null, 'POST');
        return $result;
    }

}