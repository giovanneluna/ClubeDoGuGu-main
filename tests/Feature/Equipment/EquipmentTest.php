<?php

use App\Models\Equipment;
use App\Models\EquipmentType;
use App\Models\User;
use PhpParser\Node\Expr\BinaryOp\Equal;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertModelMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

beforeEach(function () {
    $user = User::factory()->create();

    $this->actingAs($user);
});

it('should be able to render index page', function () {

    get(route('equipments.index'))->assertOk()->assertViewIs('equipment.index');

});

it('should be able to list equipments', function () {
    Equipment::factory(10)->create();

    get(route('equipments.index'))->assertOk()->assertViewIs('equipment.index')->assertViewHas('equipments', fn ($equipments) => $equipments->count() == 10);
});
it('shoul be able to render create equipment', function () {

    get(route('equipments.create'))->assertOk()->assertViewIs('equipment.create');

});

it('should be able to store equipment', function () {
    $equipment = Equipment::factory()->create();

    $request = ['name' => 'Bola', 'description' => 'Teste', 'equipment_type_id' => '1'];

    post(route('equipments.store'), $request)->assertRedirect(route('equipments.index'));

    assertDatabaseHas('equipments', $request);
});

it('should be able to render edit page', function () {
    $equipment = Equipment::factory()->create();
    get((route('equipments.edit', $equipment)))->assertOk()->assertViewIs('equipment.edit');
});

it('should be able to update equipment', function () {
    $equipment = Equipment::factory()->create();
    $equipmentType = EquipmentType::factory()->create();

    $request = ['name' => 'Bola', 'description' => 'Teste', 'equipment_type_id' => '1'];


    put(route('equipments.update', $equipment, $equipmentType), $request)->assertRedirect(route('equipments.index'));
    assertDatabaseHas('equipments', $request);
});

it('should be able to delete to equipment', function () {
    $equipment = Equipment::factory()->create();


    delete(route('equipments.destroy', $equipment))->assertRedirect(route('equipments.index'));
    assertDatabaseMissing('equipments', $equipment->toArray());
});
