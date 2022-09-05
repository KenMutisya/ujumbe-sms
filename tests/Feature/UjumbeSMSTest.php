<?php

namespace Kenmush\UjumbeSMS\Tests\Feature;

use function dd;

use Illuminate\Support\Str;
use Kenmush\UjumbeSMS\Commands\UjumbeSMSCommand;
use Kenmush\UjumbeSMS\Models\Ujumbe;
use Kenmush\UjumbeSMS\Tests\TestCase;
use Kenmush\UjumbeSMS\UjumbeSMS;

class UjumbeSMSTest extends TestCase
{
    /** @test */
    public function it_can_send_an_sms_to_a_single_number()
    {
        $phoneNumber = '0791489171';

        $response = UjumbeSMS::to([$phoneNumber])->message("Hi Kennedy ".Str::random(18));

        $this->assertDatabaseHas(Ujumbe::class, [
                'recipients' => $phoneNumber,
        ]);

        self::assertTrue($response);
    }

    public function test_it_can_enter_data_in_the_database()
    {
        $ujumbe = Ujumbe::factory()->create();
        dd($ujumbe);
        $this->call(UjumbeSMSCommand::class, 'handle');

        dd(Ujumbe::all());
    }
}
