<?php

namespace RichGerdes\JsonApi\Document;

namespace RichGerdes\JsonApi\Resource\Link\LinkCollection;
namespace RichGerdes\JsonApi\Resource\Meta\MetaInterface;

interface DocumentInterface {

  public const KEYWORD_DATA = 'data';

  public const KEYWORD_INCLUDED = 'included';

  public const KEYWORD_LINKS = 'links';

  public const KEYWORD_META = 'meta';

  public const KEYWORD_JSONAPI = 'jsonapi';

  public function getLinks(): LinkCollection;

  public function getMeta(): MetaInterface;

}
