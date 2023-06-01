<?php
namespace Vendor\Shopfinder\Test\Unit\Model\Resolver;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @covers \Vendor\Shopfinder\Model\Resolver\UpdateShop
 */
class UpdateShopTest extends TestCase
{
    /**
     * Mock shopfinderResource
     *
     * @var \Vendor\Shopfinder\Model\ResourceModel\Shopfinder|PHPUnit\Framework\MockObject\MockObject
     */
    private $shopfinderResource;

    /**
     * Mock shopfinderFactoryInstance
     *
     * @var \Vendor\Shopfinder\Model\Shopfinder|PHPUnit\Framework\MockObject\MockObject
     */
    private $shopfinderFactoryInstance;

    /**
     * Mock shopfinderFactory
     *
     * @var \Vendor\Shopfinder\Model\ShopfinderFactory|PHPUnit\Framework\MockObject\MockObject
     */
    private $shopfinderFactory;

    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    /**
     * Object to test
     *
     * @var \Vendor\Shopfinder\Model\Resolver\UpdateShop
     */
    private $testObject;

    /**
     * Main set up method
     */
    public function setUp() : void
    {
        $this->objectManager = new ObjectManager($this);
        $this->shopfinderResource = $this->createMock(\Vendor\Shopfinder\Model\ResourceModel\Shopfinder::class);
        $this->shopfinderFactoryInstance = $this->createMock(\Vendor\Shopfinder\Model\Shopfinder::class);
        $this->shopfinderFactory = $this->createMock(\Vendor\Shopfinder\Model\ShopfinderFactory::class);
        $this->shopfinderFactory->method('create')->willReturn($this->shopfinderFactoryInstance);
        $this->testObject = $this->objectManager->getObject(
        \Vendor\Shopfinder\Model\Resolver\UpdateShop::class,
            [
                'shopfinderResource' => $this->shopfinderResource,
                'shopfinderFactory' => $this->shopfinderFactory,
            ]
        );
    }

    /**
     * @return array
     */
    public function dataProviderForTestResolve()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestResolve
     */
    public function testResolve(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }
}
