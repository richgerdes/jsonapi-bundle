<?php

namespace RichGerdes\JsonApi\Resource\Relationship;

use RichGerdes\JsonApi\Resource\ResourceIdentifierCollection;

interface RelationshipInterface {

  public const KEYWORD_DATA = 'data';

  public const KEYWORD_LINKS = 'links';

  public const KEYWORD_META = 'meta';

  public function getData(): ResourceIdentifierCollection;

  public function getLinks(): ?LinkCollection;

  public function setLinks(?LinkCollection $links);

  public function getMeta(): ?MetaInterface;

  public function setMeta(?MetaInterface $meta);

}