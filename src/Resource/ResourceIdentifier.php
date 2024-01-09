<?php

namespace RichGerdes\JsonApi\Resource;

class ResourceIdentifier extends ResourceStub implements ResourceIdentifierInterface {

  public function __construct(string $type, mixed $id) {
    parent::__construct($type, $id);
  }
}
