<?php

namespace RichGerdes\JsonApi\Resource\Link;

use \Doctrine\Common\Collections\ArrayCollection;

class LinkCollection extends ArrayCollection {

  public const KEYWORD_LINKS = 'links';

  public const KEYWORD_SELF = 'self';

  /**
   * {@inheritDoc}
   */
  public function add(mixed $element)
  {
    if (!($element instanceof LinkInterface) {
      throw new \InvalidArgumentException('LinkCollection only accepts Link objects.');
    }
    parent::add($element);
  }

  /**
   * {@inheritDoc}
   */
  public function set(string|int $key, mixed $value)
  {
    if (!($value instanceof LinkInterface) {
      throw new \InvalidArgumentException('LinkCollection only accepts Link objects.');
    }
    parent::set($key, $element);
  }

}
