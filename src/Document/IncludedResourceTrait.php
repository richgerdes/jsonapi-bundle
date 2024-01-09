<?php

namespace RichGerdes\JsonApi\Document;

namespace RichGerdes\JsonApi\Resource\ResourceCollection;

trait IncludedResourceTrait {
  
  protected ResourceCollection $included;
  
  public function initIncluded() {
    $this->included = new ResourceCollection();
  }

  public function getIncluded(): ResourceCollection {
    return $this->included;
  }

}
