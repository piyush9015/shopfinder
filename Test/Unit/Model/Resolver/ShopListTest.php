<?php
namespace Vendor\Shopfinder\Test\Unit\Model\Resolver;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @covers \Vendor\Shopfinder\Model\Resolver\ShopList
 */
class ShopListTest extends TestCase
{
    /**
     * Mock getShopList
     *
     * @var \Vendor\Shopfinder\Api\ShopfinderRepositoryInterface|PHPUnit\Framework\MockObject\MockObject
     */
    private $getShopList;

    /**
     * Mock searchCriteriaBuilder
     *
     * @var \Magento\Framework\Api\SearchCriteriaBuilder|PHPUnit\Framework\MockObject\MockObject
     */
    private $searchCriteriaBuilder;

    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    /**
     * Object to test
     *
     * @var \Vendor\Shopfinder\Model\Resolver\ShopList
     */
    private $testObject;

    /**
     * Main set up method
     */
    public function setUp() : void
    {
        $this->objectManager = new ObjectManager($this);
        $this->getShopList = $this->createMock(\Vendor\Shopfinder\Api\ShopfinderRepositoryInterface::class);
        $this->searchCriteriaBuilder = $this->createMock(\Magento\Framework\Api\SearchCriteriaBuilder::class);
        $this->testObject = $this->objectManager->getObject(
        \Vendor\Shopfinder\Model\Resolver\ShopList::class,
            [
                'getShopList' => $this->getShopList,
                'searchCriteriaBuilder' => $this->searchCriteriaBuilder,
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
