<?php

    namespace Rewired\Facades;

    use Illuminate\Support\Facades\Facade;

    /**
     * @see \Rewired\Rewired
     */
    class Rewired extends Facade
    {
        protected static function getFacadeAccessor(): string
        {
            return \Rewired\Rewired::class;
        }
    }
