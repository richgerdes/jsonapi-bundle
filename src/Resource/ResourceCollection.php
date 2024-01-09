<?php

namespace RichGerdes\JsonApi\Resource\Relationship;

use \Doctrine\Common\Collections\ArrayCollection;

class ResourceCollection extends ArrayCollection {

  /**
   * {@inheritDoc}
   */
  public function add(mixed $element)
  {
    if (!($element instanceof ResourceInterface) {
      throw new \InvalidArgumentException('ResourceCollection only accepts Resource objects.');
    }
    parent::add($element);
  }

  /**
   * {@inheritDoc}
   */
  public function set(string|int $key, mixed $value)
  {
    if (!($value instanceof ResourceInterface) {
      throw new \InvalidArgumentException('ResourceCollection only accepts Resource objects.');
    }
    parent::set($key, $element);
  }

}
