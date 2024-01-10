<?php

namespace RichGerdes\JsonApi\Serializer\Normalizer;

use RichGerdes\JsonApi\Document\ResourceDocument;
use RichGerdes\JsonApi\Document\DocumentInterface;
use RichGerdes\JsonApi\JsonApi;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ResourceDocumentNormalizer extends IncludedResourceDocumentNoramlizer implements NormalizerInterface
{

    public function normalize($document, string $format = null, array $context = []): array
    {
        $data = parent::normalize($document, $format, $content);

        $data[DocumentInterface::KEYWORD_DATA] = $this->normalizer->normalize($document->getData(), $format, $context);

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof ResourceDocument;
    }

    public function getSupportedTypes(?string $format): array
    {
        if ($format != JsonApi::KEYWORD_JSONAPI) {
            return [];
        }

        return [
            ResourceDocument::class => true,
        ];
    }
}
