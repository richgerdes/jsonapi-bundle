<?php

namespace RichGerdes\JsonApi\Document;

class CollectionDocument extends AbstractDocument implements CollectionDocumentInterface {

  use IncludedResourceTrait;

  protected ResourceCollectionInterface $data;

  public function __construct(ResourceCollectionInterface $data) {
    $this->data = $data;

    $this->initIncluded();
  }

  public function getData(): ResourceCollectionInterface {
    return $this->data;
  }

}
