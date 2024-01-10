<?php

namespace RichGerdes\JsonApi\Resource\Link;

use \RichGerdes\JsonApi\Resource\Meta\MetaInterface;

interface LinkInterface {

  public const KEYWORD_HREF = 'href';

  public const KEYWORD_HREFLANG = 'hreflang';

  public const KEYWORD_REL = 'rel';
  
  public const KEYWORD_DESCRIBED_BY = 'describedby';

  public const KEYWORD_TITLE = 'title';

  public const KEYWORD_TYPE = 'type';

  public function getHref(): string;

  public function setHref(string $href);

  public function getHrefLang(): ?string;

  public function setHrefLang(?string $href_lang);

  public function getRel(): ?string;

  public function setRel(?string $rel);

  public function getDescribedBy(): ?string;

  public function setDescribedBy(?string $described_by);

  public function getTitle(): ?string;

  public function setTitle(?string $title);

  public function getType(): ?string;

  public function setType(?string $type);

  public function getMeta(): ?MetaInterface;

  public function setMeta(?MetaInterface $meta);

}
