<?php

use App\Models\Block;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\EquipmentStock;
use App\Models\Schedule;
use App\Models\ScheduleStatus;
use App\Models\User;
use Database\Seeders\ScheduleStatusSeeder;
use PhpParser\Node\Expr\BinaryOp\Equal;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertModelMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;
use function PHPUnit\Framework\assertEquals;

beforeEach(function () {
    $user = User::factory()->create();
    $this->seed(ScheduleStatusSeeder::class);
    $this->actingAs($user);
});


it('should be able to render index page', function () {

    get(route('schedules.index'))->assertOk()->assertViewIs('schedule.index');
});

it('should be able to list schedule', function () {
    Schedule::factory(10)->create();
    get(route('schedules.index'))->assertOk()->assertViewIs('schedule.index')->assertViewHas('schedules', fn ($schedules) => $schedules->count() == 10);
});

it('should be able to render create page', function () {
    $block = Block::factory()->create();

    get(route('schedule.create', $block))->assertOk()->assertViewIs('schedule.create');
});

it('should be able to store schedule', function () {
    $block = Block::factory()->create();
    $client = Client::factory()->create();
    $schedule = Schedule::factory()->create();
    $equipment = Equipment::factory()->create();
    $equipmentStock = EquipmentStock::factory(['quantity' => 20])->for($equipment)->create();

    $request = [
        'date' => 2032 - 10 - 2,
        'time' => '16:00',
        'endTime' => '17:00',
        'client_id' => $client->id,
        'block_id' => $block->id,
        'equipment_quantity' => 2,
        'paid_out' => 1,
        'quantity' => 2,
        'total_price' => 10,
        'equipments_id' => $equipment->id,
    ];

    $expectedNewEquipmentStockQuantity = $equipmentStock->quantity - $request['equipment_quantity'];

    post(route('schedules.store', $schedule), $request)->assertRedirect(route('schedules.index'));

    $equipmentStock->refresh();

    assertEquals($equipmentStock->quantity, $expectedNewEquipmentStockQuantity);

    assertDatabaseHas('schedules', [
        'date' => $request['date'],
        'time' => $request['time'],
        'endTime' => $request['endTime'],
        'client_id' => $request['client_id'],
        'total_price' => $request['total_price'],
        'paid_out' => $request['paid_out'],
        'block_id' => $request['block_id']

    ]);
});

it('should be able to render edit page', function () {
    $schedule = Schedule::factory()->create();
    get((route('schedules.edit', $schedule)))->assertViewIs('schedule.edit');
});

it('should be able to update schedule', function () {

    $block = Block::factory()->create();
    $client = Client::factory()->create();
    $schedule = Schedule::factory()->create();
    $equipment = Equipment::factory()->create();
    $equipmentStock = EquipmentStock::factory(['quantity' => 20])->for($equipment)->create();
    $scheduleStatus = ScheduleStatus::factory()->create();

    $request = [
        'date' => 2032 - 10 - 2,
        'time' => '16:00',
        'endTime' => '17:00',
        'client_id' => $client->id,
        'block_id' => $block->id,
        'equipment_quantity' => 2,
        'paid_out' => 1,
        'quantity' => 2,
        'total_price' => 10,
        'schedule_status_id' => $scheduleStatus->id,
        'equipments_id' => $equipment->id,
    ];

    $expectedNewEquipmentStockQuantity = $equipmentStock->quantity + $request['equipment_quantity'];

    put(route('schedules.update', $schedule), $request)->assertStatus(302)->assertRedirect(route('schedules.index'));
    $equipmentStock->refresh();

    assertDatabaseHas('schedules', [
        'date' => $request['date'],
        'time' => $request['time'],
        'endTime' => $request['endTime'],
        'client_id' => $request['client_id'],
        'schedule_status_id' => $request['schedule_status_id'],
        'total_price' => $request['total_price'],
        'paid_out' => $request['paid_out'],
        'block_id' => $request['block_id']

    ]);
});

it('should be able to delete schedule', function () {
    $schedule = Schedule::factory()->create();

    delete(route('schedules.destroy', $schedule))->assertRedirect(route('schedules.index'));
    assertDatabaseMissing('schedules', $schedule->toArray());
});
