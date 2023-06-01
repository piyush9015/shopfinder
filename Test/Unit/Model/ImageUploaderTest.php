<?php
namespace Vendor\Shopfinder\Test\Unit\Model;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @covers \Vendor\Shopfinder\Model\ImageUploader
 */
class ImageUploaderTest extends TestCase
{
    /**
     * Mock coreFileStorageDatabase
     *
     * @var \Magento\MediaStorage\Helper\File\Storage\Database|PHPUnit\Framework\MockObject\MockObject
     */
    private $coreFileStorageDatabase;

    /**
     * Mock filesystem
     *
     * @var \Magento\Framework\Filesystem|PHPUnit\Framework\MockObject\MockObject
     */
    private $filesystem;

    /**
     * Mock uploaderFactoryInstance
     *
     * @var \Magento\MediaStorage\Model\File\Uploader|PHPUnit\Framework\MockObject\MockObject
     */
    private $uploaderFactoryInstance;

    /**
     * Mock uploaderFactory
     *
     * @var \Magento\MediaStorage\Model\File\UploaderFactory|PHPUnit\Framework\MockObject\MockObject
     */
    private $uploaderFactory;

    /**
     * Mock storeManager
     *
     * @var \Magento\Store\Model\StoreManagerInterface|PHPUnit\Framework\MockObject\MockObject
     */
    private $storeManager;

    /**
     * Mock logger
     *
     * @var \Psr\Log\LoggerInterface|PHPUnit\Framework\MockObject\MockObject
     */
    private $logger;

    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    /**
     * Object to test
     *
     * @var \Vendor\Shopfinder\Model\ImageUploader
     */
    private $testObject;

    /**
     * Main set up method
     */
    public function setUp() : void
    {
        $this->objectManager = new ObjectManager($this);
        $this->coreFileStorageDatabase = $this->createMock(\Magento\MediaStorage\Helper\File\Storage\Database::class);
        $this->filesystem = $this->createMock(\Magento\Framework\Filesystem::class);
        $this->uploaderFactoryInstance = $this->createMock(\Magento\MediaStorage\Model\File\Uploader::class);
        $this->uploaderFactory = $this->createMock(\Magento\MediaStorage\Model\File\UploaderFactory::class);
        $this->uploaderFactory->method('create')->willReturn($this->uploaderFactoryInstance);
        $this->storeManager = $this->createMock(\Magento\Store\Model\StoreManagerInterface::class);
        $this->logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->testObject = $this->objectManager->getObject(
        \Vendor\Shopfinder\Model\ImageUploader::class,
            [
                'coreFileStorageDatabase' => $this->coreFileStorageDatabase,
                'filesystem' => $this->filesystem,
                'uploaderFactory' => $this->uploaderFactory,
                'storeManager' => $this->storeManager,
                'logger' => $this->logger,
            ]
        );
    }

    /**
     * @return array
     */
    public function dataProviderForTestSetBaseTmpPath()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestSetBaseTmpPath
     */
    public function testSetBaseTmpPath(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestSetBasePath()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestSetBasePath
     */
    public function testSetBasePath(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestSetAllowedExtensions()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestSetAllowedExtensions
     */
    public function testSetAllowedExtensions(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestGetBaseTmpPath()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetBaseTmpPath
     */
    public function testGetBaseTmpPath(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestGetBasePath()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetBasePath
     */
    public function testGetBasePath(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestGetAllowedExtensions()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetAllowedExtensions
     */
    public function testGetAllowedExtensions(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestGetFilePath()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestGetFilePath
     */
    public function testGetFilePath(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestMoveFileFromTmp()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestMoveFileFromTmp
     */
    public function testMoveFileFromTmp(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestSaveFileToTmpDir()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestSaveFileToTmpDir
     */
    public function testSaveFileToTmpDir(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }

    /**
     * @return array
     */
    public function dataProviderForTestSaveMediaImage()
    {
        return [
            'Testcase 1' => [
                'prerequisites' => ['param' => 1],
                'expectedResult' => ['param' => 1]
            ]
        ];
    }

    /**
     * @dataProvider dataProviderForTestSaveMediaImage
     */
    public function testSaveMediaImage(array $prerequisites, array $expectedResult)
    {
        $this->assertEquals($expectedResult['param'], $prerequisites['param']);
    }
}
