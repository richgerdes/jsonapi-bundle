<?php

namespace RichGerdes\JsonApi\Resource\Meta;

interface MetaInterface {
  
  public function getItems(): array;
  
  public function setItems(array $items);
  
  public function setItem(string $name, mixed $value);
  
  public function getItem(string $name): mixed;
  
  public function hasItem(string $name): bool;

}
