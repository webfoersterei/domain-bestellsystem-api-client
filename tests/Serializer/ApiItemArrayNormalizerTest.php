<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests\Serializer;


use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException;
use Webfoersterei\DomainBestellSystemApiClient\Serializer\ApiItemArrayNormalizer;

class ApiItemArrayNormalizerTest extends TestCase
{
    /** @var ApiItemArrayNormalizer */
    private $normalizer;

    public function setUp()
    {
        $this->normalizer = new ApiItemArrayNormalizer();
    }

    public function testSupportsNormalizationArrayButNoItems()
    {
        $this->assertFalse($this->normalizer->supportsNormalization(['hallo' => 'welt']));
    }

    public function testSupportsNormalizationArrayWithItems()
    {
        $obj1 = new \stdClass();
        $obj2 = new \stdClass();
        $this->assertTrue($this->normalizer->supportsNormalization([$obj1, $obj2]));
    }

    public function testSupportsNormalizationArrayWithOneItem()
    {
        $this->assertTrue($this->normalizer->supportsNormalization([new \stdClass()]));
    }

    public function testSupportsNormalizationArrayWithStrings()
    {
        $this->assertTrue($this->normalizer->supportsNormalization(['nameserver01', 'nameserver02']));
    }

    public function testSupportsNormalizationNoArray()
    {
        $this->assertFalse($this->normalizer->supportsNormalization(new \stdClass()));
    }

    public function testNormalizeWithIllegalArray()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->normalizer->normalize(['hallo' => 'welt']);
    }

    public function testNormalizeWithIllegalObject()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->normalizer->normalize(new \stdClass());
    }

    public function testSetSerializerWithIllegalSerializer()
    {
        $this->expectException(InvalidArgumentException::class);
        $wrongSerializer = $this->getMockBuilder(SerializerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->normalizer->setSerializer($wrongSerializer);
    }
}