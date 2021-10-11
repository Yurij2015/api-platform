<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211011030324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A7128C459');
        $this->addSql('DROP INDEX IDX_57698A6A7128C459 ON role');
        $this->addSql('ALTER TABLE role DROP role_permission_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role ADD role_permission_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A7128C459 FOREIGN KEY (role_permission_id) REFERENCES role_permission (id)');
        $this->addSql('CREATE INDEX IDX_57698A6A7128C459 ON role (role_permission_id)');
    }
}
