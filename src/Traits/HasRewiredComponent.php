<?php

    namespace Rewired\Traits;

    use Illuminate\Validation\ValidationException;

    trait HasRewiredComponent
    {
        public array $props = [];

        public function bootHasReactComponent(): void
        {
            $this->resetErrorBag();
        }

        public function rewiredValidation(array $messages)
        {
            $messages = collect($messages)->mapWithKeys(fn(
                $message,
                $key
            ) => [str($key)->prepend('props.')->toString() => $message])->toArray();
            throw ValidationException::withMessages($messages);
        }


    }
