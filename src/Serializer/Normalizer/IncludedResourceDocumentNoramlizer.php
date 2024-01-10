<?php

namespace RichGerdes\JsonApi\Serializer\Normalizer;

use RichGerdes\JsonApi\Document\IncludedResourceInterface;
use RichGerdes\JsonApi\JsonApi;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

abstract class IncludedResourceDocumentNoramlizer extends DocumentNormalizer implements NormalizerInterface
{

    public function normalize($document, string $format = null, array $context = []): array
    {
        $data = parent::normalize($document, $format, $context);

        if ($document instanceof IncludedResourceInterface) {
          $included_resources = $document->getIncluded();
          if (!$included_resources->isEmpty()) {
            foreach ($included_resources as $resource) {
              $data[IncludedResourceInterface::KEYWORD_INCLUDED][] = $this->normalizer->normalize($resource, $format, $context);
            }
          }
        }

        return $data;
    }

}