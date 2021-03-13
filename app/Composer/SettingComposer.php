<?php

namespace App\Composer;

use App\Setting;
use Illuminate\View\View;

class SettingComposer
{

    public $user;


    public function __construct()
    {
        $this->setting = Setting::first();
    }


    public function compose(View $view)
    {
        $view->with('setting', $this->setting);
    }

}
