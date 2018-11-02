<?php
/**
 * Description of ImACE_BaseRepository.php
 *
 * @author Lulzim Fazlija / Intermarketing Oy
 */

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
abstract class BaseRepository
{
  protected $model;
  /**
   * BaseRepository constructor.
   * @param Model $model
   */
  public function __construct(Model $model)
  {
    $this->model = $model;
  }
}