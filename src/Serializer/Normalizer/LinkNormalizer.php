<?php

namespace RichGerdes\JsonApi\Serializer\Normalizer;

use RichGerdes\JsonApi\Resource\Link\LinkInterface;
use RichGerdes\JsonApi\Resource\Meta\MetaInterface;
use RichGerdes\JsonApi\JsonApi;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class LinkNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    public function normalize($link, string $format = null, array $context = []): array|string|null
    {
        $data = [];

        $data[LinkInterface::KEYWORD_HREF] = $link->getHref();
        $data[LinkInterface::KEYWORD_HREFLANG] = $link->getHrefLang();
        $data[LinkInterface::KEYWORD_REL] = $link->getRel();
        $data[LinkInterface::KEYWORD_DESCRIBED_BY] = $link->getDescribedBy();
        $data[LinkInterface::KEYWORD_TITLE] = $link->getTitle();
        $data[LinkInterface::KEYWORD_TYPE] = $link->getType();

        $meta = $resource->getMeta();
        if (!$meta->isEmpty()) {
          foreach ($meta as $name => $meta_value) {
            $data[MetaInterface::KEYWORD_META][$name] = $meta_value;
          }
        }

        $data = array_filter($data);

        if (count($data) == 1 && isset($data[LinkInterface::KEYWORD_HREF])) {
          $data = $data[LinkInterface::KEYWORD_HREF];
        }

        if (empty($data)) {
          $data = null;
        }

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof LinkInterface;
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
