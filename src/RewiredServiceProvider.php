<?php

    namespace Rewired;

    use Illuminate\Support\Facades\Blade;
    use Spatie\LaravelPackageTools\Package;
    use Spatie\LaravelPackageTools\PackageServiceProvider;
    use Rewired\Commands\RewiredCommand;

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
                ->hasViews('rewired')
                ->hasViewComponents('rewired')
                ->hasCommand(RewiredCommand::class);
        }

        public function boot(): void
        {
            parent::boot();

            $this->publishes([
                __DIR__.'/../stubs/rewired.tsx.stub' => resource_path('js/rewired.tsx'),
                __DIR__.'/../stubs/rewired-hooks.tsx.stub' => resource_path('js/rewired-hooks.tsx'),
            ], 'rewired:tsx');

            $this->publishes([
                __DIR__.'/../stubs/TestComponent.tsx.stub' => resource_path('js/rewired/TestComponent.tsx'),
            ], 'rewired:examples');

            Blade::directive('rewiredScripts', function () {
                return Blade::compileString("
                    @viteReactRefresh
                    @vite(['resources/js/rewired.tsx'])
                ");
            });
        }
    }
