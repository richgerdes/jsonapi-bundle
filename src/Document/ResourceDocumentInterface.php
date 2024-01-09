<?php

namespace RichGerdes\JsonApi\Document;

use RichGerdes\JsonApi\Resource\ResourceInterface;

interface ResourceDocumentInterface extends IncludedResourceInterface {

  public function getData(): ResourceInterface;

}
