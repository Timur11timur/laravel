<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{
    public function collections()
    {
        $result = [];

        $eloquentCollection = BlogPost::withTrashed()->get();

        $array = $eloquentCollection->toArray();

        $collection = collect($array);

        //dd(__METHOD__, $eloquentCollection, $array, $collection);

        $result['first'] = $collection->first();
        $result['last'] = $collection->last();

        $result['where']['data'] = $collection
            ->where('category_id', 10)
            ->values() //только значения
            ->keyBy('id'); //сделать ключи из id

        dd($result);
    }
}
