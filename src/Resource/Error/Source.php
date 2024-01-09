<?php

namespace RichGerdes\JsonApi\Resource\Error;

class Source implements SourceInterface {

  protected ?string $pointer;
  protected ?string $parameter;
  protected ?string $header;

  public function getPointer(): ?string {
    return $this->pointer;
  }

  public function setPointer(?string $pointer) {
    $this->pointer = $pointer;
  }

  public function getParameter(): ?string {
    return $this->parameter;
  }

  public function setParameter(?string $parameter) {
    $this->parameter = $parameter;
  }

  public function getHeader(): ?string {
    return $this->header;
  }

  public function setHeader(?string $header) {
    $this->header = $header;
  }

}
