<?php

namespace RichGerdes\JsonApi\Serializer\Denormalizer;

use RichGerdes\JsonApi\Resource\ResourceIdentifier;
use RichGerdes\JsonApi\Resource\ResourceIdentifierInterface;
use RichGerdes\JsonApi\Resource\ResourceStubInterface;

use Symfony\Component\Serializer\Denormalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Denormalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Denormalizer\DenormalizerInterface;

class ResourceIdentifierDenoramlizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): array
    {
        return new ResourceIdentifier($data[ResourceStubInterface::KEYWORD_TYPE], $data[ResourceStubInterface::KEYWORD_ID]);
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return is_array($data) && $type == ResourceIdentifierInterface::class;
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
