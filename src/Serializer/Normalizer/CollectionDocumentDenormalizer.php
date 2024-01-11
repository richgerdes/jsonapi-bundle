<?php

namespace RichGerdes\JsonApi\Serializer\Denormalizer;

use RichGerdes\JsonApi\Document\CollectionDocument;
use RichGerdes\JsonApi\Document\DocumentInterface;
use RichGerdes\JsonApi\Resource\ResourceIdentifierInterface;
use RichGerdes\JsonApi\Resource\ResourceIdentifierCollection;
use RichGerdes\JsonApi\JsonApi;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Denormalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Denormalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Denormalizer\DenormalizerInterface;

class CollectionDocumentDenormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): array
    {
        $resource_collection = new ResourceIdentifierCollection();

        foreach ($data[DocumentInterface::KEYWORD_DATA] as $item) {
          $resource_identifier = $this->denormalizer->denormalize($item, ResourceIdentifierInterface::class, $format, $context);
          $resource_collection->add($resource_identifier);
        }

        $document = new CollectionDocument($resource_collection);

        return $document;
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return is_array($data) && $type == CollectionDocument::class;
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
