<?php

namespace Kenmush\UjumbeSMS\Commands;

use Illuminate\Console\Command;
use Kenmush\UjumbeSMS\Models\Ujumbe;

class UjumbeSMSCommand extends Command
{
    public $signature = 'ujumbesms';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        Ujumbe::create([
                'uuid' => '',
                'response_code' => '',
                'response_type' => '',
                'response_description' => '',
                'recipients' => '',
                'credits_deducted' => '',
                'available_credits' => '',
                'user_email' => '',
                'message' => '',
                'message_sent_at' => '',
                'meta' => '',
        ]);

        return self::SUCCESS;
    }
}
