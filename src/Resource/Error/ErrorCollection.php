<?php

namespace RichGerdes\JsonApi\Resource\Error;

use \Doctrine\Common\Collections\ArrayCollection;

class ErrorCollection extends ArrayCollection {

  /**
   * {@inheritDoc}
   */
  public function add(mixed $element)
  {
    if (!($element instanceof ErrorInterface) {
      throw new \InvalidArgumentException('ErrorCollection only accepts Error objects.');
    }
    parent::add($element);
  }

  /**
   * {@inheritDoc}
   */
  public function set(string|int $key, mixed $value)
  {
    if (!($value instanceof ErrorInterface) {
      throw new \InvalidArgumentException('ErrorCollection only accepts Error objects.');
    }
    parent::set($key, $element);
  }

}
