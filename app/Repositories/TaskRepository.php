<?php

namespace App\Repositories;

use App\Enums\TaskStatus;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskRepository
{
    /**
     * @param array $columns
     * @param int $perPage
     * @param string $sortBy
     * @param string $sortDirection
     * @param \App\Enums\TaskStatus $status
     */
    public function paginate(
        array $columns = ['id', 'title', 'description', 'created_at', 'updated_at'],
        int $perPage = 30, 
        ?string $sortBy = null,
        ?string $sortDirection = 'DESC',
        ?TaskStatus $status = null
    ): LengthAwarePaginator
    {
        return Task::query()
                    ->select($columns)
                    ->when($status, function(Builder $query, TaskStatus $status): void {
                        $query->where('status', $status);
                    })
                    ->when($sortBy, function(Builder $query, $sortBy) use ($sortDirection): void {
                        $query->orderBy($sortBy, $sortDirection);
                    })
                    ->paginate($perPage);

    }

    /**
     * Creates a task with the current data
     * 
     * @param  array $data
     * @return \App\Models\Task
     */
    public function create(array $data): Model
    {
        return Task::create($data);
    }

    /**
     * Update the current record with new data
     * 
     * @param \App\Models\Task $task
     * @param array $data
     * @return bool
     */
    public function update(Task $task, array $data): bool
    {
        return $task->update($data);
    }
}
