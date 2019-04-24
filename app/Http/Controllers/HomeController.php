<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        DB::connection()->enableQueryLog();

        $tasks = Task::find(1)->activity;

        foreach ($tasks as $task) {
            dump($task->toArray());
        }

        $query = DB::getQueryLog();
        
        dd($query);
    }
}
