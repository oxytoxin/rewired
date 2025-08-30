<?php

    namespace Rewired\Facades;

    use Illuminate\Support\Facades\Facade;

    /**
     * @see \oxytoxin\Rewired\Rewired
     */
    class Rewired extends Facade
    {
        protected static function getFacadeAccessor(): string
        {
            return \oxytoxin\Rewired\Rewired::class;
        }
    }
