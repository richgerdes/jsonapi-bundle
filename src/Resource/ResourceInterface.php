<?php

namespace RichGerdes\JsonApi\Resource;

interface ResourceInterface extends ResourceStubInterface {

  public const KEYWORD_ATTRIBUTES = 'attributes';

  public const KEYWORD_RELATIONSHIPS = 'relationships';

  public const KEYWORD_LINKS = 'links';

  public const KEYWORD_META = 'meta';

  public function getLinks(): ?LinkCollection;

  public function setLinks(?LinkCollection $links);

  public function getMeta(): ?MetaInterface;

  public function setMeta(?MetaInterface $meta);

}
