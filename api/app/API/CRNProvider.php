<?php

namespace App\API;

interface CRNProvider {
    
    public function find(int $crn): self;

    public function isValid(): bool;

    public function getName(): string;


}