<div class="mb-3">
    <strong>Title:</strong> {{ $task->title }}
</div>
<div class="mb-3">
    <strong>Description:</strong> {{ $task->description }}
</div>
<div class="mb-3">
    <strong>Due Date:</strong>  {{ date('D d-F,Y', strtotime($task->due_date)) }}
</div>
<div class="mb-3">
    <strong>Status:</strong> <span class="badge bg-{{ ($task->status == 'completed') ? 'success' : 'warning' }}">{{ ucfirst($task->status) }}</span>
</div>
<div class="mb-3">
    <strong>Created At:</strong> {{ $task->created_at }}
</div>
<div class="mb-3">
    <strong>Updated At:</strong> {{ $task->updated_at }}
</div>
