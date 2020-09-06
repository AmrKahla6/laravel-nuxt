<?php

namespace App\Http\Controllers;

trait ModuleTrait
{

    protected function setModuleName($module_name)
    {
        $this->module_name = $module_name ;

    }// end of setModuleName

    protected function initModel()
    {
        $module = \Str::lower($this->module_name);

        $module = \Str::singular($module);

        $module = \Str::camel($module);

        $module = \Str::ucfirst($module);

        if(in_array($module , $this->expectModules()))
        {
            return false ;
        }

        $namespace = 'App\\'.$module;

        $this->model = new $namespace ;

    }// end of init model

    protected function expectModules()
    {
        return ['Contact'];
    }
}
