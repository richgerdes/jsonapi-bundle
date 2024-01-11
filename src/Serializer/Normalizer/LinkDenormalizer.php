<?php

namespace RichGerdes\JsonApi\Serializer\Denormalizer;

use RichGerdes\JsonApi\Resource\Link\Link;
use RichGerdes\JsonApi\Resource\Link\LinkInterface;
use RichGerdes\JsonApi\Resource\Meta\MetaInterface;
use RichGerdes\JsonApi\JsonApi;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Denormalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Denormalizer\DenormalizerInterface;

class LinkDenormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): array|string|null
    {
        $link = new Link();

        if (is_string($data)) {
          $link->setHref($data);
        }
        else {
          if (isset($data[LinkInterface::KEYWORD_HREF])) {
            $link->setHref($data[LinkInterface::KEYWORD_HREF]);
          }
          if (isset($data[LinkInterface::KEYWORD_HREFLANG])) {
            $link->setHrefLang($data[LinkInterface::KEYWORD_HREFLANG]);
          }
          if (isset($data[LinkInterface::KEYWORD_REL])) {
            $link->setRel($data[LinkInterface::KEYWORD_REL]);
          }
          if (isset($data[LinkInterface::KEYWORD_DESCRIBED_BY])) {
            $link->setDescribedBy($data[LinkInterface::KEYWORD_DESCRIBED_BY]);
          }
          if (isset($data[LinkInterface::KEYWORD_TITLE])) {
            $link->setTitle($data[LinkInterface::KEYWORD_TITLE]);
          }
          if (isset($data[LinkInterface::KEYWORD_TYPE])) {
            $link->setType($data[LinkInterface::KEYWORD_TYPE]);
          }

          if (isset($data[MetaInterface::KEYWORD_META])) {
            $meta = $link->getMeta();
            $meta->setItems($data[MetaInterface::KEYWORD_META]);
          }
        }

        return $link;
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return (is_array($data) || is_string($data)) && $type == LinkInterface::class;
    }

    public function getSupportedTypes(?string $format): array
    {
        if ($format != JsonApi::KEYWORD_JSONAPI) {
            return [];
        }

        return [
            LinkInterface::class => true,
        ];
    }
}
