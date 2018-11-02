<?php
/**
 * Description of ImACE_RepositoryServiceProvider.php
 *
 * @author Lulzim Fazlija / Intermarketing Oy
 */

namespace App\Providers;

use App\Repositories\News\NewsRepository;
use App\Repositories\News\NewsRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

  /**
   * Bind the interface to an implementation repository class
   */
  public function register()
  {
    $this->app->bind(
      NewsRepositoryInterface::class,
      NewsRepository::class
    );
  }
}