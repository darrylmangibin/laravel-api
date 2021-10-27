<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
  public function apiException($request, $e)
  {
    if ($this->isModel($e)) {
      return response([
        'errors' => 'Model not found'
      ], Response::HTTP_NOT_FOUND);
    }

    if ($this->isHttp($e)) {
      return response([
        'errors' => 'Incorrect route'
      ], Response::HTTP_NOT_FOUND);
    }

    return parent::render($request, $e);
  }

  public function isModel($e) {
    return $e instanceof ModelNotFoundException;
  }

  public function isHttp($e) {
    return $e instanceof NotFoundHttpException;
  }
}
