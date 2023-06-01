<?php
namespace Vendor\Shopfinder\Test\Unit\Model;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @covers \Vendor\Shopfinder\Model\ShopfinderRepository
 */
class ShopfinderRepositoryTest extends TestCase
{
    /**
     * Mock resource
     *
     * @var \Vendor\Shopfinder\Model\ResourceModel\Shopfinder|PHPUnit\Framework\MockObject\MockObject
     */
    private $resource;

    /**
     * Mock shopfinderFactoryInstance
     *
     * @var \Vendor\Shopfinder\Api\Data\ShopfinderInterface|PHPUnit\Framework\MockObject\MockObject
     */
    private $shopfinderFactoryInstance;

    /**
     * Mock shopfinderFactory
     *
     * @var \Vendor\Shopfinder\Api\Data\ShopfinderInterfaceFactory|PHPUnit\Framework\MockObject\MockObject
     */
    private $shopfinderFactory;

    /**
     * Mock shopfinderCollectionFactoryInstance
     *
     * @var \Vendor\Shopfinder\Model\ResourceModel\Shopfinder\Collection|PHPUnit\Framework\MockObject\MockObject
     */
    private $shopfinderCollectionFactoryInstance;

    /**
     * Mock shopfinderCollectionFactory
     *
     * @var \Vendor\Shopfinder\Model\ResourceModel\Shopfinder\CollectionFactory|PHPUnit\Framework\MockObject\MockObject
     */
    private $shopfinderCollectionFactory;

    /**
     * Mock searchResultsFactoryInstance
     *
     * @var \Vendor\Shopfinder\Api\Data\ShopfinderSearchResultsInterface|PHPUnit\Framework\MockObject\MockObject
     */
    private $searchResultsFactoryInstance;

    /**
     * Mock searchResultsFactory
     *
     * @var \Vendor\Shopfinder\Api\Data\ShopfinderSearchResultsInterfaceFactory|PHPUnit\Framework\MockObject\MockObject
     */
    private $searchResultsFactory;

    /**
     * Mock collectionProcessor
     *
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface|PHPUnit\Framework\MockObject\MockObject
     */
    private $collectionProcessor;

    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    /**
     * Object to test
     *
     * @var \Vendor\Shopfinder\Model\ShopfinderRepository
     */
    private $testObject;

    /**
     * Main set up method
     */
    public function setUp() : void
    {
        $this->objectManager = new ObjectManager($this);
        $this->resource = $this->createMock(\Vendor\Shopfinder\Model\ResourceModel\Shopfinder::class);
        $this->shopfinderFactoryInstance = $this->createMock(\Vendor\Shopfinder\Api\Data\ShopfinderInterface::class);
        $this->shopfinderFactory = $this->createMock(\Vendor\Shopfinder\Api\Data\ShopfinderInterfaceFactory::class);
        $this->shopfinderFactory->method('create')->willReturn($this->shopfinderFactoryInstance);
        $this->shopfinderCollectionFactoryInstance = $this->createMock(\Vendor\Shopfinder\Model\ResourceModel\Shopfinder\Collection::class);
        $this->shopfinderCollectionFactory = $this->createMock(\Vendor\Shopfinder\Model\ResourceModel\Shopfinder\CollectionFactory::class);
        $this->shopfinderCollectionFactory->method('create')->willReturn($this->shopfinderCollectionFactoryInstance);
        $this->searchResultsFactoryInstance = $this->createMock(\Vendor\Shopfinder\Api\Data\ShopfinderSearchResultsInterface::class);
        $this->searchResultsFactory = $this->createMock(\Vendor\Shopfinder\Api\Data\ShopfinderSearchResultsInterfaceFactory::class);
        $this->searchResultsFactory->method('create')->willReturn($this->searchResultsFactoryInstance);
        $this->collectionProcessor = $this->createMock(\Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface::class);
        $this->testObject = $this->objectManager->getObject(
        \Vendor\Shopfinder\Model\ShopfinderRepository::class,
            [
                'resource' => $this->resource,
                'shopfinderFactory' => $this->shopfinderFactory,
                'shopfinderCollectionFactory' => $this->shopfinderCollectionFactory,
                'searchResultsFactory' => $this->searchResultsFactory,
                'collectionProcessor' => $this->collectionProcessor,
            ]
        );
    }

    /**
     * @return array
     */
    public function dataProviderForTestSave()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestSave
     */
    public function testSave(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestGet()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestGet
     */
    public function testGet(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestGetList()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetList
     */
    public function testGetList(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestDelete()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestDelete
     */
    public function testDelete(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestDeleteById()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestDeleteById
     */
    public function testDeleteById(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }
}
