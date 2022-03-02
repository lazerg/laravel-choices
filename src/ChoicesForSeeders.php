<?php

namespace Lazerg\LaravelChoices;

use Illuminate\Database\Seeder;

trait ChoicesForSeeders
{
    /**
     * Ask with choices
     *
     * @param array|string|null $options
     * @param callable|null $action
     * @return Choice
     */
    public function askWithChoices(array|string|null $options = null, callable $action = null): Choice
    {
        /** @type Seeder $this */
        if ($options === null) {
            return new Choice($this->command);
        }

        return (new Choice($this->command))->addChoice($options, $action);
    }
}
