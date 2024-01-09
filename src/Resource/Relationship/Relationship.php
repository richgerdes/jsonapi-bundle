<?php

namespace RichGerdes\JsonApi\Resource\Relationship;

use RichGerdes\JsonApi\Resource\Link\LinkCollection;
use RichGerdes\JsonApi\Resource\Meta\MetaInterface;

class Relationship implements RelationshipInterface {

  protected ResourceIdentifierCollection $data;

  protected ?LinkCollection $links;

  protected ?MetaInterface $meta;

  public function __construct() {
    $this->data = new ResourceIdentifierCollection();
    $this->links = new LinkCollection();
    $this->meta = new MetaInterface();
  }

  public function getData(): ResourceIdentifierCollection {
    return $this->data;
  }

  public function getMeta(): ?MetaInterface {
    return $this->meta;
  }

  public function getLinks(): ?LinkCollection {
    return $this->links;
  }

}