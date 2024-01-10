<?php

namespace RichGerdes\JsonApi\Resource;

interface ResourceInterface extends ResourceStubInterface {

  public const KEYWORD_META = 'data';
  
  public const KEYWORD_ATTRIBUTES = 'attributes';

  public const KEYWORD_RELATIONSHIPS = 'relationships';

  public const KEYWORD_LINKS = 'links';

  public const KEYWORD_META = 'meta';

  public function getAttributes(): array;

  public function setAttributes(array $attributes);

  public function getAttribute(mixed $path): mixed;

  public function setAttribute(mixed $path, mixed $value);

  public function getRelationships(): ?RelationshipCollection;

  public function getLinks(): ?LinkCollection;

}
