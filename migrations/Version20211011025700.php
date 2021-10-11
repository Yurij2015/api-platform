<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211011025700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE permission (id INT AUTO_INCREMENT NOT NULL, role_permission_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E04992AA7128C459 (role_permission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_permission (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE permission ADD CONSTRAINT FK_E04992AA7128C459 FOREIGN KEY (role_permission_id) REFERENCES role_permission (id)');
        $this->addSql('ALTER TABLE role ADD role_permission_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A7128C459 FOREIGN KEY (role_permission_id) REFERENCES role_permission (id)');
        $this->addSql('CREATE INDEX IDX_57698A6A7128C459 ON role (role_permission_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE permission DROP FOREIGN KEY FK_E04992AA7128C459');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A7128C459');
        $this->addSql('DROP TABLE permission');
        $this->addSql('DROP TABLE role_permission');
        $this->addSql('DROP INDEX IDX_57698A6A7128C459 ON role');
        $this->addSql('ALTER TABLE role DROP role_permission_id');
    }
}
