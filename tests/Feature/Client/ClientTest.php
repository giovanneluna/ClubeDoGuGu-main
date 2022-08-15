<?php

use App\Models\Client;
use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertModelMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;
use function Pest\Laravel\put;
use function PHPUnit\Framework\assertEquals;

beforeEach(function () {
    $user = User::factory()->create();

    $this->actingAs($user);
});

it('should be able to render index page', function () {

    get(route('clients.index'))->assertOk()->assertViewIs('client.index');
});


it('should be able to list clients', function () {
    Client::factory(10)->create();
    get(route('clients.index'))->assertOk()->assertViewIs('client.index')->assertViewHas('clients', fn ($clients) => $clients->count() == 10);
});

it('should be able to paginate clients', function () {
    Client::factory()
        ->count(35)
        ->create();

    get(route('clients.index', ['page' => 4]))
        ->assertOk()
        ->assertViewIs('client.index')
        ->assertViewHas('clients', fn ($clients) => $clients->count() == 5);
});

it('should be able to render create page', function () {

    get(route('clients.create'))->assertOk()->assertViewIs('client.create');
});

it('should be able to store client', function () {
    $request = ['name' => 'Joao', 'email' => 'joao@gmail.com', 'cpf' => '12345678910', 'age' => '16', 'address' => 'Rua do Jõao', 'telephone' => '38998191556'];
    post(route('clients.store'), $request)->assertRedirect(route('clients.index'));

    assertDatabaseHas('clients', $request);
});

it('should be able to render edit page', function () {
    $clients = Client::factory()->create();
    get(route('clients.edit', $clients))->assertOk()->assertViewIs('client.edit');
});

it('should be able to update client', function () {
    $clients = Client::factory()->create();
    $request = ['name' => 'Jack', 'email' => 'jack@jackz.com', 'cpf' => '30032145204', 'age' => '16', 'telephone' => '37998191556', 'address' => 'RUa do GUGU'];

    put(route('clients.update', $clients), $request)->assertRedirect(route('clients.index'));

    assertDatabaseHas('clients', $request);
});

it('should be able to delete client', function () {
    $clients = Client::factory()->create();
    delete(route('clients.destroy', $clients))->assertRedirect(route('clients.index'));

    assertDatabaseMissing('clients', $clients->toArray());
});