<?php

namespace Lazerg\LaravelChoices;

use Illuminate\Console\Command;

trait ChoicesForCommands
{
    /**
     * Ask with choices
     *
     * @param array|string|null $options
     * @param callable|null $action
     * @return Choice
     */
    public function askWithChoices(array|string|null $options = null, ?callable $action = null): Choice
    {
        /** @type Command $this */
        if ($options === null) {
            return new Choice($this);
        }

        return (new Choice($this))->addChoice($options, $action);
    }
}
