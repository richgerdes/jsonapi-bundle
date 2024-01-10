<?php

namespace RichGerdes\JsonApi\Resource\Error;

interface SourceInterface {

  public const KEYWORD_SOURCE = 'source';

  public const KEYWORD_POINTER = 'pointer';

  public const KEYWORD_PARAMETER = 'parameter';

  public const KEYWORD_HEADER = 'header';

  public function getPointer(): ?string;

  public function setPointer(?string $pointer);

  public function getParameter(): ?string;

  public function setParameter(?string $parameter);

  public function getHeader(): ?string;

  public function setHeader(?string $header);

}
