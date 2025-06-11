<?php

use App\Enums\TaskStatus;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;

uses(RefreshDatabase::class);
 

test('list tasks', function (): void {
    $tasks = Task::factory(10)->create();

    $response = $this->getJson("api/tasks");

    $response->assertStatus(200)
            ->assertJsonCount($tasks->count(), 'data');
});

test('filter tasks by status', function (): void {
    $tasks = Task::factory(10)->create();

    $status = Arr::random(TaskStatus::cases());

    $filteredTasks = $tasks->filter(fn(Task $task): bool => $task->status === $status);

    $response = $this->getJson("/api/tasks?status={$status->value}");

    $response->assertStatus(200)
            ->assertJsonCount($filteredTasks->count(), 'data');
});


test('show task', function (): void {
    $task = Task::factory()->create();

    $response = $this->getJson("api/tasks/{$task->getKey()}");

    $response->assertStatus(200)
            ->assertJson($task->only('id', 'title', 'description', 'status'));
});

test('create task', function () {
    $data = Task::factory()->make();

    $response = $this->postJson('/', $data->toArray());

    $response->assertStatus(201);

    $this->assertDatabaseHas('tasks', $data->toArray());
});

test('create invalid task', function (): void {
    $data = Task::factory()->make([
        'title' => null
    ]);    

    $response = $this->postJson('/', $data->toArray());

    $response->assertStatus(422);

    $data = Task::factory()->make([
        'title' => str_repeat('a', 256)
    ]);

    $response = $this->postJson('/', $data->toArray());

    $response->assertStatus(422);

    $this->assertDatabaseMissing('tasks', $data->toArray());
});


test('update task', function (): void {
    $task = Task::factory()->create();

    $response = $this->putJson("/api/tasks/{$task->getKey()}", [
        'title' => 'Updated Task Title',
        'description' => 'Updated Task Description',
        'status' => TaskStatus::Done->value,
    ]);
    
    $response->assertStatus(200);

    $this->assertDatabaseHas('tasks', [
        'id' => $task->getKey(),
        'title' => 'Updated Task Title',
        'description' => 'Updated Task Description',
        'status' => TaskStatus::Done->value,
    ]);
});

test('update invalid task', function (): void {
    $task = Task::factory()->create();

    $response = $this->putJson("/api/tasks/{$task->getKey()}", [
        'title' => null,
        'description' => 'Updated Task Description',
        'status' => TaskStatus::Done->value,
    ]);

    $response->assertStatus(422);

    $this->assertDatabaseHas('tasks', $task->toArray());
});

test('delete task', function (): void {
    $task = Task::factory()->create();

    $response = $this->deleteJson("api/tasks/{$task->getKey()}");

    $response->assertStatus(204);

    $this->assertDatabaseMissing('tasks', [
        'id' => $task->getKey(),
    ]);
});
