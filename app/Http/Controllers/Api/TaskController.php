<?php

namespace App\Http\Controllers\Api;

use App\Enums\TaskStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * The constructor of the class
     * 
     * @param \App\Repositories\TaskRepository $taskRepository
     * @return void
     */
    public function __construct(
        protected TaskRepository $taskRepository
    )
    { }

    /**
     * Display a listing of the resource.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $tasks = $this->taskRepository->paginate(
            status: TaskStatus::tryFrom($request->query('status')) ?? null
        );

        return response()->json(
            data: $tasks,
            status: JsonResponse::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = $this->taskRepository->create($request->validated());

        return response()->json(
            data: $task, 
            status: JsonResponse::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Task $task
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json(
            data: $task,
            status: JsonResponse::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \App\Http\Requests\TaskRequest $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        $this->taskRepository->update($task, $request->validated());

        return response()->json(
            status: JsonResponse::HTTP_NO_CONTENT
        );
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Task $task): JsonResponse
    {
        $task->delete();

        return response()->json(
            status: JsonResponse::HTTP_NO_CONTENT
        );
    }
}
