<?php declare(strict_types=1);

namespace Shopware\Core\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\Migration\MigrationStep;
use Shopware\Core\Framework\Uuid\Uuid;

class Migration1569246880AddSitemapConfig extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1569246880;
    }

    public function update(Connection $connection): void
    {
        $query = 'INSERT IGNORE INTO system_config SET
                    id = :id,
                    configuration_value = :configValue,
                    configuration_key = :configKey,
                    created_at = :createdAt;';

        $connection->executeUpdate($query, [
            'id' => Uuid::randomBytes(),
            'configKey' => 'core.sitemap.sitemapRefreshTime',
            'configValue' => '{"_value": 3600}',
            'createdAt' => date(Defaults::STORAGE_DATE_FORMAT),
        ]);

        $connection->executeUpdate($query, [
            'id' => Uuid::randomBytes(),
            'configKey' => 'core.sitemap.sitemapRefreshStrategy',
            'configValue' => '{"_value": "2"}',
            'createdAt' => date(Defaults::STORAGE_DATE_FORMAT),
        ]);
    }

    public function updateDestructive(Connection $connection): void
    {
    }
}
