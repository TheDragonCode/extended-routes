<?php

namespace Tests\Features;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    public function testNames()
    {
        $this->assertTrue(Route::has('foos.index'));
        $this->assertTrue(Route::has('foos.store'));
        $this->assertTrue(Route::has('foos.trashed'));
        $this->assertTrue(Route::has('foos.show'));
        $this->assertTrue(Route::has('foos.update'));
        $this->assertTrue(Route::has('foos.destroy'));
        $this->assertTrue(Route::has('foos.restore'));
    }

    public function testIndex()
    {
        $response = $this->get('/foos');

        $response->assertStatus(200);
        $response->assertSee('ok');
    }

    public function testStore()
    {
        $response = $this->post('/foos');

        $response->assertStatus(200);
        $response->assertSee('ok');
    }

    public function testTrashed()
    {
        $response = $this->get('/foos/trashed');

        $response->assertStatus(200);
        $response->assertSee('ok');
    }

    public function testShow()
    {
        $response = $this->get('/foos/bar');

        $response->assertStatus(200);
        $response->assertSee('bar');
    }

    public function testUpdate()
    {
        $response = $this->put('/foos/bar');

        $response->assertStatus(200);
        $response->assertSee('bar');
    }

    public function testDestroy()
    {
        $response = $this->delete('/foos/bar');

        $response->assertStatus(200);
        $response->assertSee('bar');
    }

    public function testRestore()
    {
        $response = $this->post('/foos/bar/restore');

        $response->assertStatus(200);
        $response->assertSee('bar');
    }
}
