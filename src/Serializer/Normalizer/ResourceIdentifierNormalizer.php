<?php

namespace RichGerdes\JsonApi\Serializer\Normalizer;

use RichGerdes\JsonApi\Resource\ResourceIdentifierInterface;
use RichGerdes\JsonApi\Resource\ResourceStubInterface;

use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ResourceIdentifierNoramlizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    public function normalize($document, string $format = null, array $context = []): array
    {
        $data = [];

        $data[ResourceStubInterface::KEYWORD_TYPE] = $resource->getType();
        $data[ResourceStubInterface::KEYWORD_ID] = $resource->getId();

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof ResourceIdentifierInterface;
    }

    public function getSupportedTypes(?string $format): array
    {
        if ($format != JsonApi::KEYWORD_JSONAPI) {
            return [];
        }

        return [
            ResourceIdentifierInterface::class => true,
        ];
    }

}
