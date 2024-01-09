<?php

namespace RichGerdes\JsonApi\Resource\Relationship;

use \Doctrine\Common\Collections\ArrayCollection;

class RelationshipCollection extends ArrayCollection {

  /**
   * {@inheritDoc}
   */
  public function add(mixed $element)
  {
    if (!($element instanceof RelationshipInterface) {
      throw new \InvalidArgumentException('RelationshipCollection only accepts Relationship objects.');
    }
    parent::add($element);
  }

  /**
   * {@inheritDoc}
   */
  public function set(string|int $key, mixed $value)
  {
    if (!($value instanceof RelationshipInterface) {
      throw new \InvalidArgumentException('RelationshipCollection only accepts Relationship objects.');
    }
    parent::set($key, $element);
  }

}
