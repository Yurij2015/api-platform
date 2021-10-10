<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211010083439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE object_in_app_form ADD service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE object_in_app_form ADD CONSTRAINT FK_D2FBC4BDED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_D2FBC4BDED5CA9E6 ON object_in_app_form (service_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE object_in_app_form DROP FOREIGN KEY FK_D2FBC4BDED5CA9E6');
        $this->addSql('DROP INDEX IDX_D2FBC4BDED5CA9E6 ON object_in_app_form');
        $this->addSql('ALTER TABLE object_in_app_form DROP service_id');
    }
}
