<?php

namespace App\Enumd;

enum GeneratedPostStatus: string
{
    case Draft = 'draft';
    case Archifed = 'archived';
    case Posted = 'posted';
}
