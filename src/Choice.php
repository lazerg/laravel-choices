<?php

namespace Lazerg\LaravelChoices;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class Choice
{
    private array $choices = [];

    public function __construct(protected Command $command)
    {

    }

    /**
     * Add choice to autocompletion. One or several options can be given.
     * All options can be accepted in Lower, Upper and Capitalize format.
     *
     * @param array|string $options
     * @param callable|null $action
     * @return $this
     */
    public function addChoice(array|string $options, callable $action = null): static
    {
        foreach ((array)$options as $option) {
            $this->choices[Str::lower($option)] = $action;
            $this->choices[Str::upper($option)] = $action;
            $this->choices[Str::ucfirst($option)] = $action;
        }

        return $this;
    }

    /**
     * Ask an autocompleting question from CLI.
     * Question will be asked again and again till given one of choices
     *
     * @param string $question
     * @param string|null $default
     * @return void
     */
    public function ask(string $question, string $default = null)
    {
        $choices = array_keys($this->choices);
        $choice = '';

        while (!in_array($choice, $choices)) {
            $choice = $this->command->askWithCompletion($question, $choices, $default);
        }

        if ($this->choices[$choice] !== null) {
            $this->choices[$choice]();
        }
    }
}
