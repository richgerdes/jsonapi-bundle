<?php

namespace RichGerdes\JsonApi\Resource\Relationship;

use \Doctrine\Common\Collections\ArrayCollection;

class ResourceIdentifierCollection extends ArrayCollection {

  /**
   * {@inheritDoc}
   */
  public function add(mixed $element)
  {
    if (!($element instanceof ResourceIdentifierInterface) {
      throw new \InvalidArgumentException('ResourceIdentifierCollection only accepts ResourceIdentifier objects.');
    }
    parent::add($element);
  }

  /**
   * {@inheritDoc}
   */
  public function set(string|int $key, mixed $value)
  {
    if (!($value instanceof ResourceIdentifierInterface) {
      throw new \InvalidArgumentException('ResourceIdentifierCollection only accepts ResourceIdentifier objects.');
    }
    parent::set($key, $element);
  }

}
