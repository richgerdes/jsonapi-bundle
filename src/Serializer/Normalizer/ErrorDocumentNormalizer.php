<?php

namespace RichGerdes\JsonApi\Serializer\Normalizer;

use RichGerdes\JsonApi\JsonApi;
use RichGerdes\JsonApi\Document\ErrorDocumentInterface;

use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ErrorDocumentNoramlizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    public function normalize($document, string $format = null, array $context = []): array
    {
        $data = [];

        $errors = $document->getErrors();
        if (!$errors->isEmpty()) {
          foreach ($errors as $error) {
            $data[ErrorDocumentInterface::KEYWORD_ERRORS][] = $this->normalizer->normalize($error, $format, $context);
          }
        }

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof ErrorDocumentInterface;
    }

    public function getSupportedTypes(?string $format): array
    {
        if ($format != JsonApi::KEYWORD_JSONAPI) {
            return [];
        }

        return [
            ErrorDocumentInterface::class => true,
        ];
    }

}
