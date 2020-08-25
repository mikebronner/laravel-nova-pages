# Pages for Laravel and Nova
Drop-in functionality for custom pages in Laravel and Nova.

## Installation & Customization
### Standard
If you are creating a simple app, these two steps should suffice. However, if
you need to customize things a bit more, skip these steps and move on to the
**Customized** section.
1. `composer require genealabs/laravel-nova-pages`
2. `php artisan migrate`

### Customized
The following steps should cover any special circumstances you might have for
your app, like getting this package to work with multi-tenancy, etc.
1. `composer require genealabs/laravel-nova-pages`
2. If you need to customize the migrations:
  ```sh
  php vendor:publish --provider=GeneaLabs\LaravelNovaPages\Providers\Service.php --tag=migrations
  ```
3. Customize migrations as necessary.
4. If you need to customize the Page class, create a new file at
  `app\Overrides\LaravelNovaPages\Page.php`. This example includes options for
  making Pages multi-tenant-aware. Customize to your needs:
  ```php
  <?php

  namespace App\Overrides\LaravelNovaPages;

  use GeneaLabs\LaravelNovaPages\Page as LaravelNovaPagesPage;
  // use Hyn\Tenancy\Traits\UsesTenantConnection;

  class Page extends LaravelNovaPagesPage
  {
      // use UsesTenantConnection;
  }
  ```
5. Specify that the package should use your customized `Page` class, instead of
  the default, by adding the following line to `app/Providers/AppServiceProvider.php`'s
  boot method, and also ignore the default migrations, if you chose to customize
  them above:
  ```php
  <?php

  namespace App\Providers;

  use App\Overrides\LaravelNovaPages\Page;
  use GeneaLabs\LaravelNovaPages\Page as LaravelNovaPagesPage;
  use Illuminate\Support\ServiceProvider;

  class AppServiceProvider extends ServiceProvider
  {
      public function register()
      {
          // ignore the default migration, if you customized them
          LaravelNovaPagesPage::ignoreMigrations();
      }

      public function boot()
      {
          // tell the package to use your customized model
          LaravelNovaPagesPage::useModel(Page::class);
      }
  }
  ```
