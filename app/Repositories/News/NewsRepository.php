<?php
/**
 * Description of ImACE_NewsRepository.php
 *
 * @author Lulzim Fazlija / Intermarketing Oy
 */

namespace App\Repositories\News;


use App\Models\News;
use App\Repositories\BaseRepository;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface {

  protected $model;

  /**
   * NewsRepository constructor.
   * @param News $news
   */
  public function __construct(News $news)
  {
    $this->model = $news;
  }

  /**
   * @return News[]
   */
  public function all() {
    return $this->model->all();
  }

  /**
   * @param $id
   * @return News
   */
  public function find($id) {
    return $this->model->findOrFail($id);
  }

  /**
   * @param int $perPage
   * @param string $order
   * @return News[]
   */
  public function paginate($perPage, $order='asc') {
    return $this->model->orderBy('id', $order)->paginate($perPage);
  }

  /**
   * @param array $data
   * @return News
   */
  public function create(array $data) {
    return $this->model->create($data);
  }

  /**
   * @param array $data
   * @param News $news
   * @return News
   */
  public function update(array $data, News $news) {
    $news->update($data);
    return $news;
  }

  /**
   * @param News $news
   * @return mixed
   * @throws \Exception
   */
  public function delete(News $news) {
    return $news->delete();
  }

}