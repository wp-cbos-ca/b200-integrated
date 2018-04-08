<?php

/**
 * Describes log levels.
 */
class WPLA_Log_Level
{
    // System is unusable.
    const EMERGENCY = 'emergency';

    // Action must be taken immediately.
    const ALERT     = 'alert';

    // Critical conditions.
    const CRITICAL  = 'critical';

    // Runtime errors that do not require immediate action 
    // but should typically be logged and monitored.
    const ERROR     = 'error';

    // Exceptional occurrences that are not errors.
    const WARNING   = 'warning';

    // Normal but significant events.
    const NOTICE    = 'notice';

    // Interesting events.
    const INFO      = 'info';

    // Detailed debug information.
    const DEBUG     = 'debug';
}
