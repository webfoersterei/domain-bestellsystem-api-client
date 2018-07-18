<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 18.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Serializer;


use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;

class ApiItemArrayDenormalizer extends ArrayDenormalizer
{
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
    public function supportsDenormalization($data, $type, $format = null)
    {
        if (false === strpos($type, 'Webfoersterei\DomainBestellSystemApiClient')) {
            return false;
        }

        if (\is_array($data) && isset($data['item'])) {
            return true;
        }

        return false;
    }

}