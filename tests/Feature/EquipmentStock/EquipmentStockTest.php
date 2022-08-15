<?php

use App\Models\Equipment;
use App\Models\EquipmentStock;
use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertModelMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

beforeEach(function () {
    $user = User::factory()->create();
    $this->seed(ScheduleStatusSeeder::class);
    $this->actingAs($user);
});

it('should be able to render index page', function () {

    get(route('equipment-stocks.index'))->assertOk()->assertViewIs('stock.index');
});

it('should be able to list equipment stock', function () {
    EquipmentStock::factory(10)->create();

    get(route('equipment-stocks.index'))
        ->assertOk()
        ->assertViewIs('stock.index')
        ->assertViewHas(
            'equipmentStocks',
            fn ($equipmentStock) => $equipmentStock->count() == 10
        );
});

it('should be able to render create page', function () {

    get(route('equipment-stocks.create'))->assertOk()->assertViewIs('stock.create');
});

it('should be able to store equipment stock', function () {
    $equipment = Equipment::factory()->create();

    $request = ['quantity' => '20', 'equipments_id' => '1'];

    post(route('equipment-stocks.store'), $request)->assertRedirect(route('equipment-stocks.index'));

    assertDatabaseHas('equipment_stocks', $request);
});

it('should be able to render edit page', function () {
    $equipmentStock = EquipmentStock::factory()->create();

    get(route('equipment-stocks.edit', $equipmentStock))->assertOk()->assertViewIs('stock.edit');
});

it('should be able to update equipment stock', function () {

    $equipmentStock = EquipmentStock::factory()->create();

    assertDatabaseHas('equipment_stocks', ['id' => 1, 'quantity' => 10, 'equipments_id' => $equipmentStock->id]);

    $request = ['quantity' => 15, 'equipments_id' => $equipmentStock->equipments_id];

    put(route('equipment-stocks.update', $equipmentStock->id), $request)->assertStatus(302)->assertRedirect(route('equipment-stocks.index'));

    assertDatabaseHas('equipment_stocks', ['id' => 1, 'quantity' => 15]);
});
it('should be able to delete block', function () {
    $equipmentStock = EquipmentStock::factory()->create();

    delete(route('equipment-stocks.destroy', $equipmentStock))->assertRedirect(route('equipment-stocks.index'));

    assertDatabaseMissing('equipment_stocks', $equipmentStock->toArray());
});