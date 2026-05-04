<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'all');

        $query = $request->user()->tasks()->latest();

        if (in_array($status, ['pending', 'completed'], true)) {
            $query->where('status', $status);
        } else {
            $status = 'all';
        }

        return view('dashboard', [
            'status' => $status,
            'tasks' => $query->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'task' => ['required', 'string', 'max:255'],
        ]);

        $request->user()->tasks()->create([
            'task' => $data['task'],
            'status' => 'pending',
        ]);

        return redirect()->back();
    }

    public function toggle(Request $request, Task $task)
    {
        $this->ensureTaskBelongsToUser($request, $task);

        $task->update([
            'status' => $task->status === 'completed' ? 'pending' : 'completed',
        ]);

        return redirect()->back();
    }

    public function destroy(Request $request, Task $task)
    {
        $this->ensureTaskBelongsToUser($request, $task);

        $task->delete();

        return redirect()->back();
    }

    private function ensureTaskBelongsToUser(Request $request, Task $task): void
    {
        if ($task->user_id !== $request->user()->id) {
            abort(404);
        }
    }
}
