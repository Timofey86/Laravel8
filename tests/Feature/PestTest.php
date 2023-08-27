<?php

test('Тест делает то-то и то-то', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
