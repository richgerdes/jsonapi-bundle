<?php

namespace RichGerdes\JsonApi\Serializer\Normalizer;

use RichGerdes\JsonApi\Resource\Link\LinkCollection;
use RichGerdes\JsonApi\Resource\Meta\MetaInterface;
use RichGerdes\JsonApi\Resource\ResourceIdentifierInterface;
use RichGerdes\JsonApi\Resource\ResourceInterface;
use RichGerdes\JsonApi\JsonApi;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ResourceNormalizer extends IncludedResourceDocumentNoramlizer implements NormalizerInterface
{

    public function normalize($resource, string $format = null, array $context = []): array
    {
        $data = parent::normalize($resource, $format, $content);

        $data[ResourceInterface::KEYWORD_DATA] = $this->normalizer->normalize($resource->getData(), $format, $context);

        $data[ResourceInterface::KEYWORD_ATTRIBUTES] = $resource->getAttributes();

        $relationships = $resource->getRelationships();
        if (!$relationships->isEmpty()) {
          foreach ($relationships as $name => $relationship) {
            $relationship_data = $relationship->getData();
            if ($relationship_data instanceof RelationshipInterface) {
              $data[ResourceIdentifierInterface::KEYWORD_RELATIONSHIPS][$name] = $this->normalizer->normalize($related_resource, $format, $context);
            }
            else {
              foreach ($relationship_data as $related_resource) {
                $data[ResourceIdentifierInterface::KEYWORD_RELATIONSHIPS][$name][] = $this->normalizer->normalize($related_resource, $format, $context);
              }
            }
          }
        }

        $links = $resource->getLinks();
        if (!$links->isEmpty()) {
          foreach ($links as $name => $link) {
            $data[LinkCollection::KEYWORD_LINKS][$name] = $this->normalizer->normalize($link, $format, $context);
          }
        }

        $meta = $resource->getMeta();
        if (!$meta->isEmpty()) {
          foreach ($meta as $name => $meta_value) {
            $data[MetaInterface::KEYWORD_META][$name] = $meta_value;
          }
        }

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof ResourceInterface;
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
