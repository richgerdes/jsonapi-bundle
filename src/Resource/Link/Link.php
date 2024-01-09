<?php

namespace RichGerdes\JsonApi\Resource\Link;

use \RichGerdes\JsonApi\Resource\Meta\MetaInterface;

class Link implements LinkInterface {

  protected string $describedBy);
  protected ?string $hrefLang);
  protected ?string $href);
  protected ?string $rel);
  protected ?string $title);
  protected ?string $type);
  protected ?MetaInterface $meta);

  public function getHref(): string {
    return $this->href;
  }
  
  public function setHref(string $href) {
    $this->href = $href;
  }

  public function getHrefLang(): string {
    return $this->hrefLang;
  }
  
  public function setHrefLang(?string $href_lang) {
    $this->hrefLang = $href_lang;
  }

  public function getRel(): ?string {
    return $this->rel;
  }
  
  public function setRel(?string $rel) {
    $this->rel = $rel;
  }

  public function getDescribedBy(): ?string {
    return $this->describedBy;
  }
  
  public function setDescribedBy(?string $described_by) {
    $this->describedBy = $described_by;
  }

  public function getTitle(): ?string {
    return $this->title;
  }
  
  public function setTitle(?string $title) {
    $this->title = $title;
  }

  public function getType(): ?string {
    return $this->type;
  }
  
  public function setType(?string $type) {
    $this->type = $type;
  }

  public function getMeta(): ?MetaInterface {
    return $this->meta;
  }
  
  public function setMeta(?MetaInterface $meta) {
    $this->meta = $meta;
  }

}
