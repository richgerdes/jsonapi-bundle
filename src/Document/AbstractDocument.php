<?php

namespace RichGerdes\JsonApi\Document;

namespace RichGerdes\JsonApi\Resource\Link\LinkCollection;
namespace RichGerdes\JsonApi\Resource\Meta\MetaInterface;

abstract class AbstractDocument implements DocumentInterface {

  public function __construct() {
    $this->links = new LinkCollection();
    $this->meta = new MetaInterface();
  }

  public function getLinks(): LinkCollection {
    return $this->links;
  }

  public function getMeta(): MetaInterface {
    return $this->meta;
  }

}
