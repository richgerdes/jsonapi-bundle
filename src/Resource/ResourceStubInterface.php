<?php

namespace RichGerdes\JsonApi\Resource;

use \RichGerdes\JsonApi\Resource\Meta\MetaInterface;

interface ResourceStubInterface {

  public const KEYWORD_TYPE = 'type';

  public const KEYWORD_ID = 'id';

  public const KEYWORD_META = 'meta';

  public function getType(): string;

  public function setType(string $id);

  public function getId(): mixed;

  public function setId(?mixed $id);

  public function getMeta(): ?MetaInterface;

  public function setMeta(?MetaInterface $meta);

}
