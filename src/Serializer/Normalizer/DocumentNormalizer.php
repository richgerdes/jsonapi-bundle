<?php

namespace RichGerdes\JsonApi\Serializer\Normalizer;

use RichGerdes\JsonApi\JsonApi;
use RichGerdes\JsonApi\Resource\Link\LinkCollection;
use RichGerdes\JsonApi\Resource\Meta\MetaInterface;

use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

abstract class DocumentNoramlizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    public function normalize($document, string $format = null, array $context = []): array
    {
        $data = [];

        $links = $document->getLinks();
        if (!$links->isEmpty()) {
          foreach ($links as $name => $link) {
            $data[LinkCollection::KEYWORD_LINKS][$name] = $this->normalizer->normalize($link, $format, $context);
          }
        }

        $meta = $document->getMeta();
        if (!$meta->isEmpty()) {
          foreach ($meta as $name => $meta_value) {
            $data[MetaInterface::KEYWORD_META][$name] = $meta_value;
          }
        }

        return $data;
    }

}
