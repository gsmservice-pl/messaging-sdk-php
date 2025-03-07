<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Gsmservice\Gateway\Models\Components;


/** SMS type (SmsType::SmsPro -> SMS PRO, SmsType::SmsEco -> SMS ECO, SmsType::SmsTwoWay ->SMS 2WAY) */
enum SmsType: int
{
    case SmsPro = 1;
    case SmsEco = 3;
    case SmsTwoWay = 4;
}
