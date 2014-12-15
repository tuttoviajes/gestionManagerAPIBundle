<?php
/**
 * Created by PhpStorm.
 * User: davidpv
 * Date: 9/12/14
 * Time: 12:07
 */

namespace Tuttoviajes\gestionManagerBundle\Services;

use Doctorsender\APIBundle\Exceptions\DoctorsenderResponseException;

class GestionManager
{

    protected $token, $proxy;

    public function __construct($token)
    {
        $this->token = $token;
    }

    protected function processResponse($response)
    {
        if (!is_array($response) || !isset($response['msg']) || $response['error'] == 1) {
            throw new DoctorsenderResponseException($response);
        }

        return $response['msg'];
    }

}
