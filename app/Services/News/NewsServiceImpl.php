<?php
/**
 * Description of ImACE_NewsServiceImpl.php
 *
 * @author Lulzim Fazlija / Intermarketing Oy
 */

namespace App\Services\News;


use App\Models\News;
use App\Repositories\News\NewsRepository;

class NewsServiceImpl implements NewsService {

  private $newsRepository;

  public function __construct(NewsRepository $newsRepository) {
    $this->newsRepository = $newsRepository;
  }

  /**
   * @return News[]
   */
  public function getAll() {
    return $this->newsRepository->all();
  }

  /**
   * @param $id
   * @param $options
   * @return News
   */
  public function getById($id, array $options = []) {
    return $this->newsRepository->find($id, $options);
  }

  /**
   * @param int $perPage
   * @return News[]
   */
  public function paginate($perPage = 15) {
    return $this->newsRepository->paginate($perPage,'desc');
  }

  /**
   * @param $data
   * @return News
   */
  public function create($data) {
    $news = $this->newsRepository->create($data);
    return $news;
  }

  /**
   * @param $id
   * @param $data
   * @return News
   */
  public function update($id, array $data) {
    $news = $this->newsRepository->find($id);
    return $this->newsRepository->update($data, $news);
  }

  /**
   * @param $id
   * @return mixed
   * @throws \Exception
   */
  public function delete($id) {
    $news = $this->newsRepository->find($id);
    return $this->newsRepository->delete($news);
  }
}