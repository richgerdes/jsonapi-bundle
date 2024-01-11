<?php

namespace RichGerdes\JsonApi\Serializer\Denormalizer;

use RichGerdes\JsonApi\Resource\Link\LinkCollection;
use RichGerdes\JsonApi\Resource\Meta\MetaInterface;
use RichGerdes\JsonApi\Resource\ResourceIdentifierInterface;
use RichGerdes\JsonApi\Resource\ResourceInterface;
use RichGerdes\JsonApi\Resource\Relationship\Relationship;
use RichGerdes\JsonApi\Resource\Relationship\RelationshipInterface;
use RichGerdes\JsonApi\JsonApi;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Denormalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Denormalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Denormalizer\DenormalizerInterface;

class ResourceDenormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): array
    {
        $class = $context['resource_class'] ?? ResourceBase::class;
        $resource = new $class($data[ResourceInterface::KEYWORD_TYPE], $data[ResourceInterface::KEYWORD_ID]);

        if (isset($data[ResourceInterface::KEYWORD_ATTRIBUTES])) {
          $resource->setAttributes($data[ResourceInterface::KEYWORD_ATTRIBUTES]);
        }

        if (isset($data[ResourceInterface::KEYWORD_RELATIONSHIPS])) {
          $relationships = $resource->getRelationships();
          foreach ($data[ResourceInterface::KEYWORD_RELATIONSHIPS] as $name => $relationship_group) {
            $relationship = new Relationship();
            $relationship_data = $relationship->getData();
            if (isset($relationship_group[RelationshipInterface::KEYWORD_DATA][ResourceInterface::KEYWORD_TYPE])) {
              $resource_identifier = $this->denormalizer->denormalize($relationship_group[RelationshipInterface::KEYWORD_DATA], ResourceIdentifier::class, $format, $context);
              $relationship_data->add($resource_identifier);
            }
            else {
              foreach ($relationship_group[RelationshipInterface::KEYWORD_DATA] as $relationship_item) {
                $resource_identifier = $this->denormalizer->denormalize($relationship_item, ResourceIdentifier::class, $format, $context);
                $relationship_data->add($resource_identifier);
              }
            }

            $relationships->add($relationship);
          }
        }

        return $resource;
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return is_array($data) && $type == ResourceInterface::class;
    }

    public function getSupportedTypes(?string $format): array
    {
        if ($format != JsonApi::KEYWORD_JSONAPI) {
            return [];
        }

        return [
            ResourceInterface::class => true,
        ];
    }
}
