<?php

namespace oxytoxin\Rewired;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use oxytoxin\Rewired\Commands\RewiredCommand;

class RewiredServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('rewired')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_rewired_table')
            ->hasCommand(RewiredCommand::class);
    }
}
