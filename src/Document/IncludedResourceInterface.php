<?php

namespace RichGerdes\JsonApi\Document;

namespace RichGerdes\JsonApi\Resource\ResourceCollection;

interface IncludedResourceInterface {

  public const KEYWORD_INCLUDED = 'included';

  public function initIncluded();

  public function getIncluded(): ResourceCollection;

}
