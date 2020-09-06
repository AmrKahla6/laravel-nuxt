<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contact;

class ApiController extends Controller
{
    use ResponseTrait , ModuleTrait;

    protected $module_name;
    protected $model;

    public function index($module_name)
    {
        try {
            $this->setModuleName($module_name);

            $check = $this->initModel();

            if($check === false)
            {
                return $this->youCantAcess();


            }// end if

            $data = $this->model->paginate(10);

            return $this->successWithData($data);

        } catch (\Exception $e) {
            return $this->errorResposns($e->getMessage());
        }

    }// end of index

    public function getById($module_name , $id)
    {
        try {
            $this->setModuleName($module_name);

            $check = $this->initModel();

            if($check === false)
            {
                return $this->youCantAcess();
            }// end if

            $data = $this->model->find($id);

            if($data)
            {

                return $this->successWithData($data);


            }// end if

            return $this->res([] , false , 'We cant found this ID');

        } catch (\Exception $e) {
            return $this->errorResposns($e->getMessage());
        }

    }// end of get By Id

    public function storeContact(Request $request)
    {

        $v = Validator::make($request->all() , [

            'name' => 'required|min:2|max:50',

            'email' => 'required|min:2|max:50|email',

            'mobile' => 'required|min:2|max:50',

            'messages' => 'required|min:2|max:500',
        ]);// end validator

        if($v->fails())
        {
            return $this->res($v->errors() , false , 'We get an error');
        }// end of if fails validate

        Contact::create($request->all());

        return $this->res([] , true , 'Thanks for send your message we will back soon');

    }// end of store contacts




}
