<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard() {
        $today = Carbon::now()->toDateString();
        //Total Task Count Query
        $all_tasks_count = Task::where('user_id', Auth::id())->count();
        $pending_tasks_count = Task::where('user_id', Auth::id())->where('status', 'pending')->count();
        $completed_tasks_count = Task::where('user_id', Auth::id())->where('status', 'completed')->count();
        // Today Task Count Query
        $today_all_tasks_count = Task::where('user_id', Auth::id())->whereDate('due_date', $today)->count();
        $today_pending_tasks_count = Task::where('user_id', Auth::id())->where('status', 'pending')->whereDate('due_date', $today)->count();
        $today_completed_tasks_count = Task::where('user_id', Auth::id())->where('status', 'completed')->whereDate('due_date', $today)->count();

        return view('dashboard', compact('all_tasks_count', 'pending_tasks_count', 'completed_tasks_count', 'today_all_tasks_count', 'today_pending_tasks_count', 'today_completed_tasks_count'));
    }
}
