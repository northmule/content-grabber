<?php

declare(strict_types=1);

namespace Coderun\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407054036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\SqlitePlatform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\SqlitePlatform'."
        );

        $this->addSql('ALTER TABLE processed_post ADD COLUMN wordpress_post_id INTEGER DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\SqlitePlatform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\SqlitePlatform'."
        );

        $this->addSql('CREATE TEMPORARY TABLE __temp__processed_post AS SELECT id, destination, source_item_id, source, created_at, updated_at, uuid FROM processed_post');
        $this->addSql('DROP TABLE processed_post');
        $this->addSql('CREATE TABLE processed_post --История постинга
        (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, destination VARCHAR(255) DEFAULT NULL --Идентификатор назначения (домен wp например)
        , source_item_id VARCHAR(255) DEFAULT NULL --Идентификатор записи из источника (ID запис VK)
        , source VARCHAR(255) DEFAULT NULL --Идентификатор источника(ИД группы\\domain VK)
        , created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, uuid CHAR(36) NOT NULL --Уникальный код(DC2Type:guid)
        )');
        $this->addSql('INSERT INTO processed_post (id, destination, source_item_id, source, created_at, updated_at, uuid) SELECT id, destination, source_item_id, source, created_at, updated_at, uuid FROM __temp__processed_post');
        $this->addSql('DROP TABLE __temp__processed_post');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_25D563DFD17F50A6 ON processed_post (uuid)');
    }
}
