<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;

abstract class AdminBaseController extends BaseController
{
    /**
     * AdminBaseController constructor.
     */
    public function __construct()
    {

    }
}
