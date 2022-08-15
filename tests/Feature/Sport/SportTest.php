<?php

use App\Models\Equipment;
use App\Models\Sport;
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

    $this->actingAs($user);
});

it('should be able to render index page', function () {
    get(route('sports.index'))->assertOk()->assertViewIs('sport.index');
});

it('should be able to list sport', function () {
    Sport::factory(10)->create();
    get(route('sports.index'))->assertOk()->assertViewIs('sport.index')->assertViewHas('sports', fn ($sports) => $sports->count() == 10);
});

it('should be able to render create page', function () {

    get(route('sports.create'))->assertOk()->assertViewIs('sport.create');
});

it('should be able to store sport', function () {

    $equipment = Equipment::factory()->create();

    $request = ['name' => 'aopa', 'equipments_id' => $equipment->id];

    post(route('sports.store'), $request)->assertRedirect(route('sports.index'));

    assertDatabaseHas('sports', $request);
});

it('should be able to render edit page', function () {
    $sport = Sport::factory()->create();
    get((route('sports.edit', $sport)))->assertOk()->assertViewIs('sport.edit');
});

it('should be able to update sport', function () {
    $sport = Sport::factory()->create();

    $request = ['name' => 'GugyBoul', 'equipments_id' => $sport->equipments_id];

    put(route('sports.update', $sport), $request)->assertRedirect(route('sports.index'));

    assertDatabaseHas('sports', ['id' => 1, 'name' => 'GugyBoul',]);
});

it('should be able to delete sport', function () {
    $sport = Sport::factory()->create();

    delete(route('sports.destroy', $sport))->assertRedirect(route('sports.index'));
    assertDatabaseMissing('sports', $sport->toArray());
});