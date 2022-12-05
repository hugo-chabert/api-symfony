<?php

namespace App\Faker\Provider;

use Datetime;
use DateTimeImmutable;
use Faker\Provider\Base as BaseProvider;

final class DateTimeImmutableProvider extends BaseProvider
{
    public function DateTimeImmutable(Datetime $datetime)
    {
        return DateTimeImmutable::createFromMutable($datetime);
    }
}

?>