<?php

namespace App\Utils;

class GlobalConstant
{
    // Status
    public const STATUS_ACTIVE    = 'active';
    public const STATUS_INACTIVE  = 'inactive';
    public const STATUS_RECEIVED   = 'received';
    public const STATUS_RECEIVING_IN_PROGRESS   = 'Receiving-in-Progress';
    public const STATUS_NOT_RECEIVED     = 'not-received';
    public const STATUS_GRADED     = 'graded';
    public const STATUS_GRADING_IN_PROGRESS   = 'Grading-in-Progress';

    // Default
    public const DEFAULT_PER_PAGE     = 12;
    public const DEFAULT_RECENT_LIMIT = 5;
    public const DEFAULT_THUMB_WIDTH  = 300;
    public const DEFAULT_THUMB_HEIGHT = 170;
    public const DEFAULT_QR_CODE_SIZE = 300;

}

