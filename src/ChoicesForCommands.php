<?php

namespace Lazerg\LaravelChoices;

trait ChoicesForCommands
{
    /**
     * Ask with choices
     *
     * @param array|string $options
     * @param callable|null $action
     * @return Choice
     */
    public function askWithChoices(array|string $options, callable $action = null): Choice
    {
        return (new Choice($this))->addChoice($options, $action);
    }
}
