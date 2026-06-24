<?php

namespace App\Enums;

enum RawContentStatus: string
{
    case Pendimg = 'pending';
    case Processing = 'processing';
    case Compleated = 'compleated';
    case Failed = 'failed';

}
