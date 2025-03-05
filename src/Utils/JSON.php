<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Gsmservice\Gateway\Utils;


use Speakeasy\Serializer\Handler\ArrayCollectionHandler;
use Speakeasy\Serializer\Handler\HandlerRegistry;
use Speakeasy\Serializer\Handler\IteratorHandler;
use Speakeasy\Serializer\Handler\StdClassHandler;
use Speakeasy\Serializer\SerializationContext;
use Speakeasy\Serializer\SerializerBuilder;


class JSON
{
    public static function createSerializer(): \Speakeasy\Serializer\Serializer
    {
        return SerializerBuilder::create()->configureHandlers(
            static function (HandlerRegistry $registry): void {
                $registry->registerSubscribingHandler(new StdClassHandler());
                $registry->registerSubscribingHandler(new ArrayCollectionHandler());
                $registry->registerSubscribingHandler(new IteratorHandler());
                $registry->registerSubscribingHandler(new MixedJSONHandler());
                $registry->registerSubscribingHandler(new EnumHandler());
                $registry->registerSubscribingHandler(new DateTimeHandler());
                $registry->registerSubscribingHandler(new DateHandler());
                $registry->registerSubscribingHandler(new UnionHandler());
                $registry->registerSubscribingHandler(new BigIntHandler());
                $registry->registerSubscribingHandler(new BigDecimalHandler());
            },
        )->setTypeParser(new PhpDocTypeParser()
        )->setSerializationContextFactory(function () {
            return SerializationContext::create()
                ->setSerializeNull(true);
        })->build();
    }
}
