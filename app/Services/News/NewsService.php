<?php
/**
 * Description of ImACE_NewsService.php
 *
 * @author Lulzim Fazlija / Intermarketing Oy
 */

namespace App\Services\News;


use App\Models\News;

interface NewsService {

  /**
   * @return News[]
   */
  public function getAll();

  /**
   * @param $id
   * @param $options
   * @return News
   */
  public function getById($id, array $options = []);

  /**
   * @param int $perPage
   * @return News[]
   */
  public function paginate($perPage);

  /**
   * @param $data
   * @return News
   */
  public function create($data);

  /**
   * @param $id
   * @param $data
   * @return News
   */
  public function update($id, array $data);

  /**
   * @param $id
   * @return mixed
   * @throws \Exception
   */
  public function delete($id);
}