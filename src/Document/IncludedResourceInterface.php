<?php

namespace RichGerdes\JsonApi\Document;

namespace RichGerdes\JsonApi\Resource\ResourceCollection;

interface IncludedResourceInterface {

  public function initIncluded();

  public function getIncluded(): ResourceCollection;

}
