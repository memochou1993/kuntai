<?php

namespace App\Http\Controllers\Front;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as FrontBaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends FrontBaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
