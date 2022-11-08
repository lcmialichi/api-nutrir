<?php

namespace App\Services;

use App\API\CFN;
use App\Exceptions\ServiceException;

class CRNService {

    public function __construct( private CFN $crn){
    }

    public function validate(int|string $crn): void {

        $this->crn->find($crn);
        if(!$this->crn->isValid()){
            throw new ServiceException("Nao achou o CRN!", 422);
        }
    }   



}