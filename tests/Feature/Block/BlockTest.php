<?php

use App\Models\Block;
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

    get(route('blocks.index'))->assertOk()->assertViewIs('block.index');
});

it('should be able to list blocks', function () {
    Block::factory(10)->create();
    get(route('blocks.index'))->assertOk()->assertViewIs('block.index')->assertViewHas('blocks', fn ($blocks) => $blocks->count() == 10);
});

it('should be able to render create page', function () {

    get(route('blocks.create'))->assertOk()->assertViewIs('block.create');
});

it('should be able to store block', function () {
    $block = Block::factory()->create();

    $request = ['block_type' => 'QuadraA', 'sport_id' => '1', 'public_amount' => '200', 'is_available' => '1', 'local' => 'Casa de Miguelzão', 'amount' => '20'];
    post(route('blocks.store'), $request)->assertRedirect(route('blocks.index'));

    assertDatabaseHas('blocks', $request);
});

it('should be able to render edit page', function () {
    $block = Block::factory()->create();
    get((route('blocks.edit', $block)))->assertOk()->assertViewIs('block.edit');
});

it('should be able to update block', function () {
    $sport = Sport::factory()->create();
    $block = Block::factory()->create();

    $request = ['block_type' => 'QuadraABC', 'sport_id' => '2', 'public_amount' => '200', 'is_available' => '1', 'local' => 'Casa de byelzaoS', 'amount' => '352'];

    put(route('blocks.update', $block, $sport), $request)->assertRedirect(route('blocks.index'));
    assertDatabaseHas('blocks', $request);
});

it('should be able to delete block', function () {
    $block = Block::factory()->create();

    delete(route('blocks.destroy', $block))->assertRedirect(route('blocks.index'));
    assertDatabaseMissing('blocks', $block->toArray());
});
