<?php

namespace App;

enum GeneratedPostStatus: string
{
    case Draft = 'draft';
    case Archived = 'archived';
    case Posted = 'posted';
}
