<?php

namespace App\Http\Controllers;

trait ResponseTrait
{
    public function errorResposns($e)
    {
        return $this->res([] , false , $e);
    }// end of  Error Resposns

    public function successWithData($data)
    {
        return $this->res($data , true , 'Here what we found in'.$this->module_name);
    }// end of success with data

    protected function youCantAcess()
    {
        return $this->res([] , false , 'You can not access this module');

    }// end if  you Cant Access

    protected function res($data= [] , $status = true , $message = '')
    {
        $data =[
            'payload' => $data ,
            'status' => $status,
            'message' => $message
        ];

        return response()->json($data);

    }// end of res
}
