<?php

namespace RichGerdes\JsonApi\Serializer\Denormalizer;

use RichGerdes\JsonApi\Document\ResourceDocument;
use RichGerdes\JsonApi\Document\DocumentInterface;
use RichGerdes\JsonApi\JsonApi;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Denormalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Denormalizer\DenormalizerInterface;

class ResourceDocumentDenormalizer extends IncludedResourceDocumentDenoramlizer implements DenormalizerInterface
{

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): array
    {
        $resource = $this->denormalizer->denormalize($data[DocumentInterface::KEYWORD_DATA], ResourceBase::class, $format, $context);

        $document = new ResourceDocument($resource);

        return $document;
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return is_array($data) && $type == ResourceDocument::class;
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
