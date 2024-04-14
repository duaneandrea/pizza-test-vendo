<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240414135755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_item (id INT AUTO_INCREMENT NOT NULL, single_order_id INT DEFAULT NULL, pizza_id INT DEFAULT NULL, quantity INT DEFAULT NULL, special_instructions VARCHAR(512) NOT NULL, INDEX IDX_52EA1F0962F0670F (single_order_id), INDEX IDX_52EA1F09D41D1D42 (pizza_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pizza (id INT AUTO_INCREMENT NOT NULL, ingridients_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(512) DEFAULT NULL, size VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_CFDD826F19D0AD40 (ingridients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F0962F0670F FOREIGN KEY (single_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id)');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826F19D0AD40 FOREIGN KEY (ingridients_id) REFERENCES ingredient (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F0962F0670F');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09D41D1D42');
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_CFDD826F19D0AD40');
        $this->addSql('DROP TABLE order_item');
        $this->addSql('DROP TABLE pizza');
    }
}
