<?php

namespace Patterns\FabricMethod\Enum;

enum ShippingRegion: string
{
    case UKRAINE = 'Ukraine';
    case EUROPE = 'Europe';
    case USA = 'USA';
    case CANADA = 'Canada';
    case AUSTRALIA = 'Australia';
}