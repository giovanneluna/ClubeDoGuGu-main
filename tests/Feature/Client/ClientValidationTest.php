<?php

use App\Models\Client;
use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

beforeEach(function () {
    $user = User::factory()->create();

    $this->actingAs($user);
});

it('should not be able to store a new client with invalid data', function () {

    post(route('clients.store'))->assertRedirect()->assertInvalid(['name', 'cpf', 'email', 'age', 'address', 'telephone']);
});

it('should  be able to store unique ', function () {


    post(route('clients.store'))->assertRedirect()->assertValid('name', 'cpf', 'email', 'age', 'address', 'telephone');
});