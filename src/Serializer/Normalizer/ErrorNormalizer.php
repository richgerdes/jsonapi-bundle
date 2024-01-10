<?php

namespace RichGerdes\JsonApi\Serializer\Normalizer;

use RichGerdes\JsonApi\JsonApi;
use RichGerdes\JsonApi\Resource\Error\ErrorInterface;
use RichGerdes\JsonApi\Resource\Error\SourceInterface;
use RichGerdes\JsonApi\Resource\Meta\MetaInterface;

use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ErrorDocumentNoramlizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    public function normalize($error, string $format = null, array $context = []): array
    {
        $data = [];
        
        $data[ErrorInterface::KEYWORD_ID] = $error->getId();
        $data[ErrorInterface::KEYWORD_STATUS] = $error->getTitle();
        $data[ErrorInterface::KEYWORD_CODE] = $error->getDetail();
        $data[ErrorInterface::KEYWORD_DETAIL] = $error->getSource();
        
        $source = $error->getSource();
        if ($source) {
          $data[SourceInterface::KEYWORD_SOURCE][SourceInterface::KEYWORD_POINTER] = $source->getPointer();
          $data[SourceInterface::KEYWORD_SOURCE][SourceInterface::KEYWORD_PARAMETER] = $source->getParameter();
          $data[SourceInterface::KEYWORD_SOURCE][SourceInterface::KEYWORD_HEADER] = $source->getHeader();
          
          $data[SourceInterface::KEYWORD_SOURCE] = array_filter($data[SourceInterface::KEYWORD_SOURCE]);
        }

        $links = $error->getLinks();
        if (!$links->isEmpty()) {
          foreach ($links as $name => $link) {
            $data[LinkCollection::KEYWORD_LINKS][$name] = $this->normalizer->normalize($link, $format, $context);
          }
        }

        $meta = $error->getMeta();
        if (!$meta->isEmpty()) {
          foreach ($meta as $name => $meta_value) {
            $data[MetaInterface::KEYWORD_META][$name] = $meta_value;
          }
        }
          
        $data = array_filter($data);

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof ErrorInterface;
    }

    public function getSupportedTypes(?string $format): array
    {
        if ($format != JsonApi::KEYWORD_JSONAPI) {
            return [];
        }

        return [
            ErrorInterface::class => true,
        ];
    }

}
