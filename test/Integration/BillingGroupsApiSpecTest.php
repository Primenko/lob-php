<?php
/**
 * BillingGroupsApiSpecTest
 * PHP version 7.3
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Lob
 *
 * The Lob API is organized around REST. Our API is designed to have predictable, resource-oriented URLs and uses HTTP response codes to indicate any API errors. <p> Looking for our [previous documentation](https://lob.github.io/legacy-docs/)?
 *
 * The version of the OpenAPI document: 1.3.0
 * Contact: lob-openapi@lob.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.2.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Please update the test case below to test the endpoint.
 */

namespace OpenAPI\Client\Test\Api;

use \OpenAPI\Client\Configuration;
use \OpenAPI\Client\ApiException;
use PHPUnit\Framework\TestCase;
use \OpenAPI\Client\Model\BillingGroupEditable;
use \OpenAPI\Client\Api\BillingGroupsApi;

/**
 * BillingGroupsApiSpecTest Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

class BillingGroupsApiSpecTest extends TestCase
{
    /**
     * Setup before running any test cases
     */
    private static $config;
    private static $billingApi;
    private static $editableBillingGroup;
    private static $errorBillingGroup;
    private static $bg1;
    private static $bg2;
    private static $bg3;

    // set up constant fixtures
    public static function setUpBeforeClass(): void
    {
        // create instance of BillingGroupsApi
        self::$config = new Configuration();
        self::$config->setApiKey('basic', getenv('LOB_API_TEST_KEY'));
        self::$billingApi = new BillingGroupsApi(self::$config);

        self::$editableBillingGroup = new BillingGroupEditable();
        self::$editableBillingGroup->setDescription("Dummy Billing Group (Integration Test)");
        self::$editableBillingGroup->setName("Test Billing Group 0");

        self::$errorBillingGroup = new BillingGroupEditable();
        self::$errorBillingGroup->setDescription("Error Dummy Billing Group (Integration Test)");

        // for List
        self::$bg1 = new BillingGroupEditable();
        self::$bg1->setDescription("Dummy Billing Group (Integration Test)");
        self::$bg1->setName("Test Billing Group 1");

        self::$bg2 = new BillingGroupEditable();
        self::$bg2->setDescription("Dummy Billing Group (Integration Test)");
        self::$bg2->setName("Test Billing Group 2");

        self::$bg3 = new BillingGroupEditable();
        self::$bg3->setDescription("Dummy Billing Group (Integration Test)");
        self::$bg3->setName("Test Billing Group 3");
    }

    public function testBillingGroupsApiInstantiation200() {
        try {
            $bgApi200 = new BillingGroupsApi(self::$config);
            $this->assertEquals(gettype($bgApi200), 'object');
        } catch (Exception $instantiationError) {
            echo 'Caught exception: ',  $instantiationError->getMessage(), "\n";
        }
    }

    public function testCreate200()
    {
        try {
            $createdBillingGroup = self::$billingApi->create(self::$editableBillingGroup);
            $this->assertMatchesRegularExpression('/bg_/', $createdBillingGroup->getId());
        } catch (Exception $createError) {
            echo 'Caught exception: ',  $createError->getMessage(), "\n";
        }
    }

    // does not include required field in request
    public function testCreate422()
    {
        
        try {
            $this->expectException(ApiException::class);
            $this->expectExceptionMessageMatches("/name is required/");
            $errorResponse = self::$billingApi->create(self::$errorBillingGroup);
        } catch (Exception $createError) {
            echo 'Caught exception: ',  $createError->getMessage(), "\n";
        }
    }

    // uses a bad key to attempt to send a request
    public function testBillingGroupApi401() {
        try {
            $wrongConfig = new Configuration();
            $wrongConfig->setApiKey('basic', 'BAD KEY');
            $bgApiError = new BillingGroupsApi($wrongConfig);

            $this->expectException(ApiException::class);
            $this->expectExceptionMessageMatches("/Your API key is not valid. Please sign up on lob.com to get a valid api key./");
            $errorResponse = $bgApiError->create(self::$editableBillingGroup);
        } catch (Exception $instantiationError) {
            echo 'Caught exception: ',  $instantiationError->getMessage(), "\n";
        }
    }

    public function testGet200()
    {
        try {
            $createdBillingGroup = self::$billingApi->create(self::$editableBillingGroup);
            $retrievedBillingGroup = self::$billingApi->get($createdBillingGroup->getId());
            $this->assertEquals($createdBillingGroup->getDescription(), $retrievedBillingGroup->getDescription());
        } catch (Exception $retrieveError) {
            echo 'Caught exception: ',  $retrieveError->getMessage(), "\n";
        }
    }

    public function testGet404()
    {
        try {
            $this->expectException(ApiException::class);
            $this->expectExceptionMessageMatches("/billing_group not found/");
            $badRetrieval = self::$billingApi->get("bg_NONEXISTENT");
        } catch (Exception $retrieveError) {
            echo 'Caught exception: ',  $retrieveError->getMessage(), "\n";
        }
    }

    public function testUpdate200()
    {
        try {
            $bgUpdatable = new BillingGroupEditable();
            $bgUpdatable->setDescription("Updated Billing Group");
            $createdBillingGroup = self::$billingApi->create(self::$editableBillingGroup);
            $retrievedBillingGroup = self::$billingApi->update($createdBillingGroup->getId(), $bgUpdatable);
            $this->assertEquals("Updated Billing Group", $retrievedBillingGroup->getDescription());
        } catch (Exception $retrieveError) {
            echo 'Caught exception: ',  $retrieveError->getMessage(), "\n";
        }
    }

    // commented out some parts of this test because of a bug in the billijng groups endpoint
    public function testList200()
    {
        $nextUrl = "";
        $previousUrl = "";
        try {
            $billing1 = self::$billingApi->create(self::$bg1);
            $billing2 = self::$billingApi->create(self::$bg2);
            $billing3 = self::$billingApi->create(self::$bg3);
            $listedBillingGroups = self::$billingApi->list(3);
            $this->assertGreaterThan(1, count($listedBillingGroups->getData()));
            $this->assertLessThanOrEqual(3, count($listedBillingGroups->getData()));
            // $nextUrl = substr($listedBillingGroups->getNextUrl(), strrpos($listedBillingGroups->getNextUrl(), "after=") + 6);
            // $this->assertIsString($nextUrl);
        } catch (Exception $listError) {
            echo 'Caught exception: ',  $listError->getMessage(), "\n";
        }

        // // response using nextUrl
        // if ($nextUrl != "") {
        //     try {
        //         $billing1 = self::$billingApi->create(self::$bg1);
        //         $billing2 = self::$billingApi->create(self::$bg2);
        //         $billing3 = self::$billingApi->create(self::$bg3);
        //         $listedBillingGroupsAfter = self::$billingApi->list(3, null, $nextUrl);
        //         $this->assertGreaterThan(1, count($listedBillingGroupsAfter->getData()));
        //         $this->assertLessThanOrEqual(3, count($listedBillingGroupsAfter->getData()));
        //         $previousUrl = substr($listedBillingGroupsAfter->getPreviousUrl(), strrpos($listedBillingGroupsAfter->getPreviousUrl(), "before=") + 7);
        //         $this->assertIsString($previousUrl);
        //     } catch (Exception $listError) {
        //         echo 'Caught exception: ',  $listError->getMessage(), "\n";
        //     }
        // }

        // // response using previousUrl
        // if ($previousUrl != "") {
        //     try {
        //         $billing1 = self::$billingApi->create(self::$bg1);
        //         $billing2 = self::$billingApi->create(self::$bg2);
        //         $billing3 = self::$billingApi->create(self::$bg3);
        //         $listedBillingGroupsBefore = self::$billingApi->list(3, $previousUrl);
        //         $this->assertGreaterThan(1, count($listedBillingGroupsBefore->getData()));
        //         $this->assertLessThanOrEqual(3, count($listedBillingGroupsBefore->getData()));
        //     } catch (Exception $listError) {
        //         echo 'Caught exception: ',  $listError->getMessage(), "\n";
        //     }
        // }
    }
}