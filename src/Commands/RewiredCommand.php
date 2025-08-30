<?php

namespace oxytoxin\Rewired\Commands;

use Illuminate\Console\Command;

class RewiredCommand extends Command
{
    public $signature = 'rewired';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
