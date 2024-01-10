<?php

namespace RichGerdes\JsonApi\Serializer\Normalizer;

use RichGerdes\JsonApi\Document\CollectionDocument;
use RichGerdes\JsonApi\Document\DocumentInterface;
use RichGerdes\JsonApi\JsonApi;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CollectionDocumentNormalizer extends IncludedResourceDocumentNoramlizer implements NormalizerInterface
{

    public function normalize($document, string $format = null, array $context = []): array
    {
        $data = parent::normalize($document, $format, $content);

        $resources = $document->getData();
        if (!$resources->isEmpty()) {
          foreach ($resources as $resource) {
            $data[DocumentInterface::KEYWORD_DATA][] = $this->normalizer->normalize($resource, $format, $context);
          }
        }

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof CollectionDocument;
    }

    public function getSupportedTypes(?string $format): array
    {
        if ($format != JsonApi::KEYWORD_JSONAPI) {
            return [];
        }

        return [
            CollectionDocument::class => true,
        ];
    }
}
