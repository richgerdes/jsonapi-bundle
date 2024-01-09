<?php

namespace RichGerdes\JsonApi\Resource;

use \RichGerdes\JsonApi\Resource\Link\LinkCollection;

class ResourceBase extends ResourceStub implements ResourceInterface {

  protected array $attributes = [];

  protected ?RelationshipCollection $relationships;

  protected ?LinkCollection $links;

  public function __construct(string $type, mixed $id) {
    parent::__construct($type, $id);

    $this->relationships = new RelationshipCollection();
    $this->links = new LinkCollection();
  }

  public function getRelationships(): ?RelationshipCollection {
    return $this->relationships;
  }

  public function getLinks(): ?LinkCollection {
    return $this->links;
  }

}
