<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TaskController extends Controller
{
    /**
     * Fetch Task...
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Task::where('user_id', Auth::user()->id);

            if ($request->filtering) {
                $query->where('status', $request->filtering);
            }

            if ($request->sorting == 'latest') {
                $query->orderByDesc('created_at');
            } elseif ($request->sorting == 'oldest') {
                $query->orderBy('created_at');
            } elseif ($request->sorting == 'due_date_asc') {
                $query->orderBy('due_date');
            } elseif ($request->sorting == 'due_date_desc') {
                $query->orderByDesc('due_date');
            }else{
                $query->orderByDesc('created_at');
            }

            $tasks = $query->get();

            return DataTables::of($tasks)
                ->addIndexColumn()
                ->editColumn('due_date', function ($row) {
                    return '<span class="badge bg-dark">' . date('D d-F,Y', strtotime($row->due_date)) . '</span>';
                })
                ->editColumn('status', function ($row) {
                    return '<span class="badge text-dark bg-' . ($row->status == 'pending' ? 'warning' : 'success') . '">' . ucfirst($row->status) . '</span>';
                })
                ->addColumn('action', function ($row) {
                    return '
                        <button type="button" data-id="'.$row->id.'" class="btn btn-primary btn-sm viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
                        <button type="button" data-id="'.$row->id.'" class="btn btn-info btn-sm editBtn" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                        <button type="button" data-id="'.$row->id.'" class="btn btn-danger btn-sm deleteBtn">Delete</button>
                        <button type="button" data-id="'.$row->id.'" class="btn btn-' . ($row->status == 'pending' ? 'success' : 'warning') . ' btn-sm statusBtn">' . ($row->status == 'pending' ? 'Completed' : '&nbsp; Pending &nbsp; ') . '</button>
                    ';
                })
                ->rawColumns(['due_date', 'status', 'action'])
                ->make(true);
        }

        return view('tasks.index');
    }

    /**
     * Store Task...
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,completed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray(),
            ]);
        }

        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Task stored successfully.',
        ]);
    }

    /**
     * View Task...
     */
    public function show(Task $task)
    {
        return view('tasks.show')->with('task', $task);
    }

    /**
     * Edit Task...
     */
    public function edit(string $id)
    {
        $task = Task::where('id', $id)->first();
        return response()->json($task);
    }

    /**
     * Update Task...
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        $validator = validator($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,completed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray(),
            ]);
        }

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Task updated successfully.',
        ]);
    }

    /**
     * Delete Task...
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Task deleted successfully.'
        ]);
    }

    /**
     * Task Status Change...
     */
    public function status($id)
    {
        $task = Task::findOrFail($id);
        if($task->status == "pending"){
            $task->status = "completed";
        }else{
            $task->status = "pending";
        }
        $task->save();

        return response()->json([
            'status' => 200,
            'message' => 'Task status change successfully.',
        ]);
    }

    /**
     * Status Pending All Task...
     */
    public function pendingAll()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->where('status', 'completed')->update(['status' => 'pending']);

        if ($tasks > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'All tasks pending successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'No completed tasks found to update.',
            ]);
        }
    }

    /**
     * Status Completed All Task...
     */
    public function completedAll()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->where('status', 'pending')->update(['status' => 'completed']);

        if ($tasks > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'All tasks completed successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'No pending tasks found to update.',
            ]);
        }
    }

    /**
     * Delete Completed Task...
     */
    public function deleteCompleted()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->where('status', 'completed')->delete();

        if ($tasks > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'Completed task delete successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'No completed tasks found to delete.',
            ]);
        }
    }

    /**
     * Delete All Task...
     */
    public function deleteAll()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->delete();

        if ($tasks > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'All task delete successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'No tasks found to delete.',
            ]);
        }
    }
}
