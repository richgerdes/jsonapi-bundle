<?php

namespace RichGerdes\JsonApi\Resource\Error;

interface SourceInterface {

  public function getPointer(): ?string;

  public function setPointer(?string $pointer);

  public function getParameter(): ?string;

  public function setParameter(?string $parameter);

  public function getHeader(): ?string;

  public function setHeader(?string $header);

}
