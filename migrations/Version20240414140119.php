<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240414140119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pizza_inventory (id INT AUTO_INCREMENT NOT NULL, pizza_id INT DEFAULT NULL, stock_level VARCHAR(255) DEFAULT NULL, reorder_threshhold VARCHAR(255) DEFAULT NULL, INDEX IDX_33B310B0D41D1D42 (pizza_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pizza_inventory ADD CONSTRAINT FK_33B310B0D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza_inventory DROP FOREIGN KEY FK_33B310B0D41D1D42');
        $this->addSql('DROP TABLE pizza_inventory');
    }
}
