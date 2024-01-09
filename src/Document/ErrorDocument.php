<?php

namespace RichGerdes\JsonApi\Document;

use RichGerdes\JsonApi\Resource\Error\ErrorCollection;

class ErrorDocument extends AbstractDocument implements ErrorDocumentInterface {

  protected ErrorCollection $errors;

  public function __construct() {
    $this->errors = new ErrorCollection();
  }

  public function getErrors(): ErrorCollection {
    return $this->errors;
  }

}
