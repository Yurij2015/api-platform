<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211010082216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE object_in_app_form ADD application_form_id INT NOT NULL');
        $this->addSql('ALTER TABLE object_in_app_form ADD CONSTRAINT FK_D2FBC4BDB4489E4E FOREIGN KEY (application_form_id) REFERENCES application_form (id)');
        $this->addSql('CREATE INDEX IDX_D2FBC4BDB4489E4E ON object_in_app_form (application_form_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE object_in_app_form DROP FOREIGN KEY FK_D2FBC4BDB4489E4E');
        $this->addSql('DROP INDEX IDX_D2FBC4BDB4489E4E ON object_in_app_form');
        $this->addSql('ALTER TABLE object_in_app_form DROP application_form_id');
    }
}
