<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211011030614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE permission DROP FOREIGN KEY FK_E04992AA7128C459');
        $this->addSql('DROP INDEX IDX_E04992AA7128C459 ON permission');
        $this->addSql('ALTER TABLE permission DROP role_permission_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE permission ADD role_permission_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE permission ADD CONSTRAINT FK_E04992AA7128C459 FOREIGN KEY (role_permission_id) REFERENCES role_permission (id)');
        $this->addSql('CREATE INDEX IDX_E04992AA7128C459 ON permission (role_permission_id)');
    }
}
