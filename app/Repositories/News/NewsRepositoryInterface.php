<?php
/**
 * Description of ImACE_NewsRepositoryInterface.php
 *
 * @author Lulzim Fazlija / Intermarketing Oy
 */

namespace App\Repositories\News;

use App\Models\News;

interface NewsRepositoryInterface {

  /**
   * @return News[]
   */
  public function all();

  /**
   * @param $id
   * @return News
   */
  public function find($id);

  /**
   * @param int $perPage
   * @param string $order
   * @return News[]
   */
  public function paginate($perPage, $order);

  /**
   * @param array $data
   * @return News
   */
  public function create(array $data);

  /**
   * @param array $data
   * @param News $news
   * @return News
   */
  public function update(array $data, News $news);

  /**
   * @param News $news
   * @return mixed
   * @throws \Exception
   */
  public function delete(News $news);
}