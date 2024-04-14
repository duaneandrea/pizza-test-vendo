<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240414140617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE kitchen_event (id INT AUTO_INCREMENT NOT NULL, person_responsible_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(512) DEFAULT NULL, event_date DATETIME DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, INDEX IDX_83F316A785F7E32B (person_responsible_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE kitchen_event ADD CONSTRAINT FK_83F316A785F7E32B FOREIGN KEY (person_responsible_id) REFERENCES kitchen_staff (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kitchen_event DROP FOREIGN KEY FK_83F316A785F7E32B');
        $this->addSql('DROP TABLE kitchen_event');
    }
}
