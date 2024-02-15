<?php
namespace Tests\Unit;

use Tests\TestCase; // Cambio importante aquí
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Repositories\Event\Contracts\EventRepositoryInterface;
use App\Repositories\Event\EventRepository;
use Mockery;

use App\Models\User;
use App\Models\Event;

class EventServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    use RefreshDatabase; // Si decides interactuar con la base de datos

    public function testCreateEvent()
    {
        $eventData = Event::factory()->make()->toArray();

        $repository = new EventRepository();
        $event = $repository->create($eventData,1);

        $this->assertInstanceOf(Event::class, $event);
        $this->assertEquals($eventData['name'], $event->name);
        // Continúa con más aserciones según sea necesario
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}

