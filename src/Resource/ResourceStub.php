<?php

namespace RichGerdes\JsonApi\Resource;

use \RichGerdes\JsonApi\Resource\Meta\MetaInterface;

abstract class ResourceStub interface ResourceStubInterface {

  protected string $type;

  protected mixed $id;

  protected ?MetaInterface $meta;

  public function __construct(string $type, mixed $id) {
    $this->type = $type;
    $this->id = $id;

    $this->meta = new MetaInterface();
  }

  public function getType(): string {
    return $this->type;
  }

  public function setType(string $id) {
    $this->type = $type;
  }

  public function getId(): mixed {
    return $this->id;
  }

  public function setId(mixed $id) {
    $this->id = $id;
  }

  public function getMeta(): ?MetaInterface {
    return $this->meta;
  }

}
