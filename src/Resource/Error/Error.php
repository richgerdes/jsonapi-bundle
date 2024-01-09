<?php

namespace RichGerdes\JsonApi\Resource\Error;

use RichGerdes\JsonApi\Resource\Link\LinkCollection;
use RichGerdes\JsonApi\Resource\Meta\MetaInterface;

interface ErrorInterface {

  protected ?string $id;

  protected ?LinkCollection $links;

  protected ?string $status;

  protected ?string $code;

  protected ?string $string;

  protected ?string $detail;

  protected ?SourceInterface $source;

  protected ?MetaInterface $meta;

  public function getId(): ?string {
    return $this->id;
  }

  public function setId(?string $id) {
    $this->id = $id;
  }

  public function getLinks(): ?LinkCollection {
    return $this->links;
  }

  public function setLinks(?LinkCollection $links) {
    $this->links = $links;
  }

  public function getStatus(): ?string {
    return $this->status;
  }

  public function setStatus(?string $status) {
    $this->status = $status;
  }

  public function getCode(): ?string {
    return $this->code;
  }

  public function setCode(?string $code) {
    $this->code = $code;
  }

  public function getTitle(): ?string {
    return $this->string;
  }

  public function setTitle(?string $string) {
    $this->string = $string;
  }

  public function getDetail(): ?string {
    return $this->detail;
  }

  public function setDetail(?string $detail) {
    $this->detail = $detail;
  }

  public function getSource(): ?SourceInterface {
    return $this->source;
  }

  public function setSource(?SourceInterface $source) {
    $this->source = $source;
  }

  public function getMeta(): ?MetaInterface {
    return $this->meta;
  }

  public function setMeta(?MetaInterface $meta) {
    $this->meta = $meta;
  }

}
