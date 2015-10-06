<?php

namespace App\Http\Controllers;

use App\Multimedia;
use App\Festival;
use Mockery;

class MultimediaControllerTest extends Controller {

    /**
     * */
    public function testCreate() {
        $this->call('GET', 'multimedia/create');

        $this->assertResponseOk();
    }

    public function testStoreFails() {
        $this->mock->shouldReceive('create')
                ->once()
                ->andReturn(Mockery::mock(array(
                            'isSaved' => false,
                            'errors' => array()
        )));

        $this->call('POST', 'multimedia');

        $this->assertRedirectedToRoute('users.create');
        $this->assertSessionHasErrors();
    }

    public function testStoreSuccess() {
        $this->mock->shouldReceive('create')
                ->once()
                ->andReturn(Mockery::mock(array(
                            'isSaved' => true
        )));

        $this->call('POST', 'multimedia');
        $this->assertRedirectedToRoute('users.index');
        $this->assertSessionHas('flash');
    }

    public function testShow() {
        $this->mock->shouldReceive('find')
                ->once()
                ->with(1);

        $this->call('GET', 'multimedia/1');

        $this->assertResponseOk();
    }

    public function testEdit() {
        $this->call('GET', 'multimedia/1/edit');

        $this->assertResponseOk();
    }

    public function testUpdateFails() {
        $this->mock->shouldReceive('update')
                ->once()
                ->with(1)
                ->andReturn(Mockery::mock(array(
                            'isSaved' => false,
                            'errors' => array()
        )));

        $this->call('PUT', 'multimedia/1');

        $this->assertRedirectedToRoute('multimedia.edit', 1);
        $this->assertSessionHasErrors();
    }

    public function testUpdateSuccess() {
        $this->mock->shouldReceive('update')
                ->once()
                ->with(1)
                ->andReturn(Mockery::mock(array(
                            'isSaved' => true
        )));

        $this->call('PUT', 'multimedia/1');

        $this->assertRedirectedToRoute('multimedia.show', 1);
        $this->assertSessionHas('flash');
    }

}

?>