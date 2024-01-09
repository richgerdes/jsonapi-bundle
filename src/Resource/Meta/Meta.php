<?php

namespace RichGerdes\JsonApi\Resource\Meta;

class Meta implements MetaInterface {

  public const KEYWORD_META = 'meta';
  
  /**
   * The meta data values.
   *
   * @var array
   */
  protected $items;

  public function __construct(?array $items = []) {
    if (is_null($items)) {
      $items = [];
    }
    $this->items = $items;

    $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
  }

  public function getItems(): array {
    return $this->items;
  }

  public function setItems(array $items) {
    $this->items = $items;
  }

  public function setItem(mixed $path, mixed $value) {
    $this->propertyAccessor->setValue($this->items, $path, $value);
  }

  public function getItem(mixed $path): mixed {
    $this->propertyAccessor->getValue($this->items, $path);
  }
  
  public function hasItem(mixed $path): bool {
    return $this->propertyAccessor->getValue($this->items, $path) !== null;
  }

}
