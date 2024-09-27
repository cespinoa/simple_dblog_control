<?php

namespace Drupal\simple_dblog_control\Logger;

use Drupal\dblog\Logger\DbLog as BaseDbLog;
use Stringable;

/**
 * Logs events in the watchdog database table.
 */
class DbLog extends BaseDbLog {

  /**
   * {@inheritdoc}
   */
  public function log($level, Stringable|string $message, array $context = []): void {
    $excluded_channels = \Drupal::config('simple_dblog_control.settings')->get('channels');
    $excluded_channels_array = array_map('trim', explode("\n", $excluded_channels));

    $excluded_strings = \Drupal::config('simple_dblog_control.settings')->get('strings');
    $excluded_strings_array = array_map('trim', explode("\n", $excluded_strings));

    if (isset($context['channel']) && in_array($context['channel'], $excluded_channels_array)) {
      return;
    }

    foreach ($excluded_strings_array as $excluded_string) {
      if (strpos($message, $excluded_string) != FALSE) {
        return;
      }
    }

    parent::log($level, $message, $context);
  }
}

