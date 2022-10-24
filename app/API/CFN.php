<?php

namespace App\API;

use App\Exceptions\ServiceException;
use Illuminate\Support\Facades\Http;

class CFN implements CRNProvider
{

    private string $url = "https://cnn.cfn.org.br/application/front-resource/get";

    /**
     * @var int
     */
    private int $crnNumber;
    /**
     * @var bool 
     */
    private bool $valid = false;

    public function find(int $crn): self {

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST',$this->url, [
            'verify' => false,
            "body" => json_encode([
                "comando" => "get-nutricionista",
                "options" => [
                    "crn" => null,
                    "registro" => $crn,
                    "geral" => true,
                ]
            ])
        ]);

        $body = $response->getBody();
        $data = json_decode($body->read($body->getSize()));
        if(!$data->success || empty($data->data)){
            $this->valid = false;
        }
        
        $itens = array_filter($data->data, function($iten) use ($crn){
            if($iten->registro == $crn){
                if($iten->situacao == "ATIVO"){
                    return true;
                }
            }
        
            return false;
        });

        if(!empty($itens)){
            $this->valid = true;
        }
        
        return $this;

    }

    
    public function isValid(): bool
    {
        return $this->valid;
    }

    public function getName(): string{
        return "nome do fpd";
    }
}
