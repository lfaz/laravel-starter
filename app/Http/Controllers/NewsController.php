<?php

namespace App\Http\Controllers;

use Validator;
use App\Services\News\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller {

  /**
   * @var NewsService
   */
  private $newsService;

  /**
   * @param NewsService $newsService
   */
  public function __construct(NewsService $newsService) {
    $this->newsService = $newsService;
  }

  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function index(Request $request) {
    return response()->json($this->newsService->paginate(5), 200);
  }

  /**
   * @return \Illuminate\Http\JsonResponse
   */
  public function showAll() {
    return response()->json(['data' => $this->newsService->getAll(), 'message' => ''], 200);
  }

  /**
   * @param $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function show($id) {
    try {
      $news = $this->newsService->getById($id);
      return response()->json(['data' => $news, 'message' => ''], 200);
    } catch (\Exception $e) {
      return response()->json(['data' => null, 'message' => $e->getMessage()], 500);
    }

  }

  /**
   * @param Request $request
   * @return \App\Models\News
   */
  public function store(Request $request) {
    $messages = [
      'required' => ':attribute nuk munde te jete e zbrazet.',
    ];

    $validator = Validator::make($request->all(), [
      'slug' => 'required|unique:news|max:255',
      'title' => 'required',
      'content' => 'required'
    ], $messages);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 500);
    }

    try {
      $news = $this->newsService->create($request->all());
      return response()->json(['data' => $news, 'message' => 'Lajmi u krijua me sukses.'], 200);
    } catch (\Exception $e) {
      return response()->json(['data' => null, 'message' => $e->getMessage()], 500);
    }
  }

  /**
   * @param Request $request
   * @param $id
   * @return \App\Models\News
   */
  public function update(Request $request, $id) {
    try {
      $news = $this->newsService->update($id, $request->all());
      return response()->json(['data' => $news, 'message' => 'Lajmi u ndryshua me sukses.'], 200);
    } catch (\Exception $e) {
      return response()->json(['data' => null, 'message' => $e->getMessage()], 500);
    }
  }

  /**
   * @param Request $request
   * @param $id
   * @return mixed
   */
  public function delete(Request $request, $id) {
    try {
      $this->newsService->delete($id);
      return response()->json(['data' => null, 'message' => 'Lajmi u fshi me sukses.'], 200);
    } catch (\Exception $e) {
      return response()->json(['data' => null, 'message' => $e->getMessage()], 500);
    }
  }
}
