<?php

namespace RichGerdes\JsonApi\Document;

use RichGerdes\JsonApi\Resource\ResourceCollectionInterface;

interface CollectionDocumentInterface extends IncludedResourceInterface {

  public function getData(): ResourceCollectionInterface;

}
