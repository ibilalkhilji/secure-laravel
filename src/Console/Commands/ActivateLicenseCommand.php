<?php

namespace Ibilalkhilji\SecureLaravel\Console\Commands;

use Exception;
use Ibilalkhilji\SecureLaravel\Services\PassportValidator;
use Illuminate\Console\Command;

class ActivateLicenseCommand extends Command
{
    protected $signature = 'passport:activate {key : License key}';
    protected $description = 'Authorise system using license key';

    public function handle(): int
    {
        $key = (string)$this->argument('key');

        try {
            if (PassportValidator::createLicense($key)) {
                $this->info('License key activated successfully.');
                return self::SUCCESS;
            }
        } catch (Exception $e) {
            $this->error("Failed to activate license key.\n" . $e->getMessage());
            return self::FAILURE;
        }

        $this->error('Failed to activate license key.');
        return self::FAILURE;
    }
}
