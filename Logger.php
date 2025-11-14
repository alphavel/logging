<?php

namespace Alphavel\Logging;

use Psr\Log\LoggerInterface;

class Logger implements LoggerInterface
{
    private string $logPath;

    private bool $enabled = true;

    private string $dateFormat = 'Y-m-d H:i:s';

    public function __construct(string $logPath = null)
    {
        $this->logPath = $logPath ?? $this->getDefaultPath();
        $this->ensureDirectoryExists();
    }

    /**
     * PSR-3: System is unusable.
     */
    public function emergency(string|\Stringable $message, array $context = []): void
    {
        $this->log('EMERGENCY', (string) $message, $context);
    }

    /**
     * PSR-3: Action must be taken immediately.
     */
    public function alert(string|\Stringable $message, array $context = []): void
    {
        $this->log('ALERT', (string) $message, $context);
    }

    /**
     * PSR-3: Critical conditions.
     */
    public function critical(string|\Stringable $message, array $context = []): void
    {
        $this->log('CRITICAL', (string) $message, $context);
    }

    /**
     * PSR-3: Runtime errors that do not require immediate action.
     */
    public function error(string|\Stringable $message, array $context = []): void
    {
        $this->log('ERROR', (string) $message, $context);
    }

    /**
     * PSR-3: Exceptional occurrences that are not errors.
     */
    public function warning(string|\Stringable $message, array $context = []): void
    {
        $this->log('WARNING', (string) $message, $context);
    }

    /**
     * PSR-3: Normal but significant events.
     */
    public function notice(string|\Stringable $message, array $context = []): void
    {
        $this->log('NOTICE', (string) $message, $context);
    }

    /**
     * PSR-3: Interesting events.
     */
    public function info(string|\Stringable $message, array $context = []): void
    {
        $this->log('INFO', (string) $message, $context);
    }

    /**
     * PSR-3: Detailed debug information.
     */
    public function debug(string|\Stringable $message, array $context = []): void
    {
        $this->log('DEBUG', (string) $message, $context);
    }

    /**
     * PSR-3: Logs with an arbitrary level.
     */
    public function log($level, string|\Stringable $message, array $context = []): void
    {
        if (! $this->enabled) {
            return;
        }

        $timestamp = date($this->dateFormat);
        $contextStr = ! empty($context) ? ' ' . json_encode($context, JSON_UNESCAPED_SLASHES) : '';
        $entry = "[{$timestamp}] {$level}: {$message}{$contextStr}\n";

        @file_put_contents($this->logPath, $entry, FILE_APPEND | LOCK_EX);
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function setDateFormat(string $format): void
    {
        $this->dateFormat = $format;
    }

    public function clear(): void
    {
        @file_put_contents($this->logPath, '');
    }

    public function getPath(): string
    {
        return $this->logPath;
    }

    private function getDefaultPath(): string
    {
        return __DIR__ . '/../../../storage/logs/app.log';
    }

    private function ensureDirectoryExists(): void
    {
        $dir = dirname($this->logPath);

        if (! is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
    }
}
