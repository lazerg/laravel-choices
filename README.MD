# Laravel Choices for CLI

## Usage with Seeder
```php
use Lazerg\LaravelChoices\ChoicesForSeeders;

class DatabaseSeeder extends Seeder
{
    use ChoicesForSeeders;
    
    public function run()
    {
      $this
          ->askWithChoices('No')
          ->addChoice('Yes', fn() => $this->call(FakeDataSeeder::class))
          ->ask('Run FakeDataSeeder?', 'No');
    }
}
```
