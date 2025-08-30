<?php

namespace Rewired\Commands;

use Illuminate\Console\Command;

class RewiredCommand extends Command
{
    public $signature = 'rewired:install';

    public $description = 'Installs necessary files for Rewired';

    public function handle(): int
    {
        $this->comment('Installing Rewired...');
        $this->comment('Publishing tsx files...');
        $this->call('vendor:publish', ['--tag' => 'rewired:tsx', '--force' => true]);

        $answer = $this->choice('Do you want to publish example React Component to /resources/js/rewired?',
            ['y' => 'Yes', 'n' => 'No'],
            'n');
        if ($answer === 'y') {
            $this->comment('Publishing test component...');
            $this->call('vendor:publish', ['--tag' => 'rewired:examples', '--force' => true]);
        }

        $answer = $this->choice('Do you want to create a Livewire layout?',
            ['y' => 'Yes', 'n' => 'No'],
            'n');
        if ($answer === 'y') {
            $this->call('livewire:layout');
        }

        $this->comment('Consider to ⭐  the github repository to support the project!');

        return self::SUCCESS;
    }
}
