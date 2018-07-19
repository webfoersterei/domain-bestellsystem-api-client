<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 18.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Serializer;


use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException;

class ApiItemArrayNormalizer extends ArrayDenormalizer implements NormalizerInterface
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @param SerializerInterface $serializer
     * @return ApiItemArrayNormalizer
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function setSerializer(SerializerInterface $serializer): ApiItemArrayNormalizer
    {
        parent::setSerializer($serializer);

        if (!$serializer instanceof NormalizerInterface) {
            throw new InvalidArgumentException('Expected a serializer that also implements NormalizerInterface.');
        }
        $this->serializer = $serializer;

        return $this;
    }

    /**
     * @inheritDoc
     * @throws \InvalidArgumentException
     */
    public function normalize($object, $format = null, array $context = array())
    {
        if (!\is_array($object) || !$this->isItemArray($object)) {
            throw new \InvalidArgumentException('Normalize called wrong');
        }

        $filteredArray = [];
        foreach ($object as $key => $value) {
            $filteredArray[$key] = $this->serializer->normalize($value);
        }

        return ['item' => $filteredArray];
    }

    /**
     * Determines if an array qualifies as item-array for api
     * @param $value
     * @return bool
     */
    private function isItemArray($value): bool
    {
        if (!\is_array($value)) {
            return false;
        }

        // If multiDimension-array: true
        foreach ($value as $v) {
            if (\is_array($v) || \is_object($v)) {
                return true;
            }
        }

        // If array has more than one key and the keys are numeric (list of something...)
        // List of String is needed for DomainUpdate.nameserver
        return \count($value) > 1 && \count(array_filter(array_keys($value), '\is_string')) === 0;
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null)
    {
        return \is_array($data) && $this->isItemArray($data);
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {

        /**
         * $data['items'] can be ONE array representing ONE object (one item in a list)
         * or a multidimensional array representing multiple objects.
         *
         * It looks like this if representing one object:
         * $data['item'] = ['property1' => 'value1', 'property2' => 'value2'];
         *
         * It looks like this if representing multiple objects:
         * $data['item'] = [
         *  ['property1' => 'value1', 'property2' => 'value2'],
         *  ['property1' => 'anothervalue1', 'property2' => 'anothervalue2']
         * ]
         */

        // If $data['item'] represents one object
        if (\is_string(array_keys($data['item'])[0])) {
            $data['item'] = [$data['item']]; # wrap it as array
        }

        return parent::denormalize($data['item'], $class, $format, $context);
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null, array $context = array())
    {
        return \is_array($data) && isset($data['item']) && false !== strpos($type,
                'Webfoersterei\DomainBestellSystemApiClient');
    }

}