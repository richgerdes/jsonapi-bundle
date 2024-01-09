<?php

namespace RichGerdes\JsonApi\Document;

class ResourceDocument extends AbstractDocument implements ResourceDocumentInterface {

  use IncludedResourceTrait;

  protected ResourceInterface $data;

  public function __construct(ResourceInterface $data) {
    $this->data = $data;

    $this->initIncluded();
  }

  public function getData(): ResourceInterface {
    return $this->data;
  }

}
