<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240414143521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(512) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, category VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pizza_price (id INT AUTO_INCREMENT NOT NULL, pizza_id INT DEFAULT NULL, size VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_3CB92001D41D1D42 (pizza_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(512) DEFAULT NULL, start_date DATETIME DEFAULT NULL, end_date DATETIME DEFAULT NULL, discount_percentage DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion_menu_item (promotion_id INT NOT NULL, menu_item_id INT NOT NULL, INDEX IDX_A623047D139DF194 (promotion_id), INDEX IDX_A623047D9AB44FE0 (menu_item_id), PRIMARY KEY(promotion_id, menu_item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pizza_price ADD CONSTRAINT FK_3CB92001D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id)');
        $this->addSql('ALTER TABLE promotion_menu_item ADD CONSTRAINT FK_A623047D139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promotion_menu_item ADD CONSTRAINT FK_A623047D9AB44FE0 FOREIGN KEY (menu_item_id) REFERENCES menu_item (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza_price DROP FOREIGN KEY FK_3CB92001D41D1D42');
        $this->addSql('ALTER TABLE promotion_menu_item DROP FOREIGN KEY FK_A623047D139DF194');
        $this->addSql('ALTER TABLE promotion_menu_item DROP FOREIGN KEY FK_A623047D9AB44FE0');
        $this->addSql('DROP TABLE menu_item');
        $this->addSql('DROP TABLE pizza_price');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE promotion_menu_item');
    }
}
