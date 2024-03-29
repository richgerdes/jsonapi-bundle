<?php

namespace RichGerdes\JsonApi\Resource\Error;

use RichGerdes\JsonApi\Resource\Link\LinkCollection;
use RichGerdes\JsonApi\Resource\Meta\MetaInterface;

interface ErrorInterface {
  
  public const KEYWORD_ID = 'id';

  public const KEYWORD_LINKS_ABOUT = 'about';
  
  public const KEYWORD_LINKS_TYPE = 'type';
  
  public const KEYWORD_STATUS = 'status';
  
  public const KEYWORD_CODE = 'code';
  
  public const KEYWORD_DETAIL = 'detail';

  public function getId(): ?string;

  public function setId(?string $id);

  public function getLinks(): ?LinkCollection;

  public function setLinks(?LinkCollection $links);
  
  public function getStatus(): ?string;
  
  public function setStatus(?string $status);
  
  public function getCode(): ?string;
  
  public function setCode(?string $code);
  
  public function getTitle(): ?string;
  
  public function setTitle(?string $string);
  
  public function getDetail(): ?string;
  
  public function setDetail(?string $detail);

  public function getSource(): ?SourceInterface;

  public function setSource(?SourceInterface $source);
  
  public function getMeta(): ?MetaInterface;

  public function setMeta(?MetaInterface $meta);
  
  
}
