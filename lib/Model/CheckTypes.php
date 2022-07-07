<?php
/**
 * CheckTypes
 *
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
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Model;
use \OpenAPI\Client\ObjectSerializer;

/**
 * CheckTypes Class Doc Comment
 *
 * @category Class
 * @description Unique identifier referring to status of check
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class CheckTypes
{
    /**
     * Possible values of this enum
     */
    const NUMBER_CREATED = 'check.created';

    const NUMBER_RENDERED_PDF = 'check.rendered_pdf';

    const NUMBER_RENDERED_THUMBNAILS = 'check.rendered_thumbnails';

    const NUMBER_DELETED = 'check.deleted';

    const NUMBER_MAILED = 'check.mailed';

    const NUMBER_IN_TRANSIT = 'check.in_transit';

    const NUMBER_IN_LOCAL_AREA = 'check.in_local_area';

    const NUMBER_PROCESSED_FOR_DELIVERY = 'check.processed_for_delivery';

    const NUMBER_RE_ROUTED = 'check.re-routed';

    const NUMBER_RETURNED_TO_SENDER = 'check.returned_to_sender';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::NUMBER_CREATED,
            self::NUMBER_RENDERED_PDF,
            self::NUMBER_RENDERED_THUMBNAILS,
            self::NUMBER_DELETED,
            self::NUMBER_MAILED,
            self::NUMBER_IN_TRANSIT,
            self::NUMBER_IN_LOCAL_AREA,
            self::NUMBER_PROCESSED_FOR_DELIVERY,
            self::NUMBER_RE_ROUTED,
            self::NUMBER_RETURNED_TO_SENDER
        ];
    }
}

