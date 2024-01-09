<?php

namespace RichGerdes\JsonApi\Document;

interface ErrorDocumentInterface extends DocumentInterface {

  public const KEYWORD_ERRORS = 'errors';

  public function getErrors(): ErrorCollection;

}
