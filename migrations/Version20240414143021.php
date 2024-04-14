<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240414143021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bonus (id INT AUTO_INCREMENT NOT NULL, employee_id INT DEFAULT NULL, approved_by_id INT DEFAULT NULL, amount DOUBLE PRECISION DEFAULT NULL, reason VARCHAR(255) DEFAULT NULL, INDEX IDX_9F987F7A8C03F15C (employee_id), INDEX IDX_9F987F7A2D234F6A (approved_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_event (id INT AUTO_INCREMENT NOT NULL, attendees_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(512) DEFAULT NULL, event_date DATETIME DEFAULT NULL, INDEX IDX_7C5FA8C23C76898B (attendees_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, position VARCHAR(255) DEFAULT NULL, department VARCHAR(255) DEFAULT NULL, salary DOUBLE PRECISION DEFAULT NULL, hire_date DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payroll (id INT AUTO_INCREMENT NOT NULL, employee_id INT DEFAULT NULL, payment_date DATETIME DEFAULT NULL, amount DOUBLE PRECISION DEFAULT NULL, payment_method VARCHAR(255) DEFAULT NULL, INDEX IDX_499FBCC68C03F15C (employee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE purchase_order (id INT AUTO_INCREMENT NOT NULL, supplier_id INT DEFAULT NULL, order_date DATETIME DEFAULT NULL, delivery_date DATETIME DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, INDEX IDX_21E210B22ADD6D8C (supplier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE purchase_order_purchase_order_item (purchase_order_id INT NOT NULL, purchase_order_item_id INT NOT NULL, INDEX IDX_8F932B5CA45D7E6A (purchase_order_id), INDEX IDX_8F932B5C3207420A (purchase_order_item_id), PRIMARY KEY(purchase_order_id, purchase_order_item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE purchase_order_item (id INT AUTO_INCREMENT NOT NULL, purchase_order_id INT DEFAULT NULL, item_id INT DEFAULT NULL, quantity INT DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_5ED948C3A45D7E6A (purchase_order_id), INDEX IDX_5ED948C3126F525E (item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bonus ADD CONSTRAINT FK_9F987F7A8C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE bonus ADD CONSTRAINT FK_9F987F7A2D234F6A FOREIGN KEY (approved_by_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE company_event ADD CONSTRAINT FK_7C5FA8C23C76898B FOREIGN KEY (attendees_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE payroll ADD CONSTRAINT FK_499FBCC68C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE purchase_order ADD CONSTRAINT FK_21E210B22ADD6D8C FOREIGN KEY (supplier_id) REFERENCES supplier (id)');
        $this->addSql('ALTER TABLE purchase_order_purchase_order_item ADD CONSTRAINT FK_8F932B5CA45D7E6A FOREIGN KEY (purchase_order_id) REFERENCES purchase_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE purchase_order_purchase_order_item ADD CONSTRAINT FK_8F932B5C3207420A FOREIGN KEY (purchase_order_item_id) REFERENCES purchase_order_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE purchase_order_item ADD CONSTRAINT FK_5ED948C3A45D7E6A FOREIGN KEY (purchase_order_id) REFERENCES purchase_order (id)');
        $this->addSql('ALTER TABLE purchase_order_item ADD CONSTRAINT FK_5ED948C3126F525E FOREIGN KEY (item_id) REFERENCES ingredient (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bonus DROP FOREIGN KEY FK_9F987F7A8C03F15C');
        $this->addSql('ALTER TABLE bonus DROP FOREIGN KEY FK_9F987F7A2D234F6A');
        $this->addSql('ALTER TABLE company_event DROP FOREIGN KEY FK_7C5FA8C23C76898B');
        $this->addSql('ALTER TABLE payroll DROP FOREIGN KEY FK_499FBCC68C03F15C');
        $this->addSql('ALTER TABLE purchase_order DROP FOREIGN KEY FK_21E210B22ADD6D8C');
        $this->addSql('ALTER TABLE purchase_order_purchase_order_item DROP FOREIGN KEY FK_8F932B5CA45D7E6A');
        $this->addSql('ALTER TABLE purchase_order_purchase_order_item DROP FOREIGN KEY FK_8F932B5C3207420A');
        $this->addSql('ALTER TABLE purchase_order_item DROP FOREIGN KEY FK_5ED948C3A45D7E6A');
        $this->addSql('ALTER TABLE purchase_order_item DROP FOREIGN KEY FK_5ED948C3126F525E');
        $this->addSql('DROP TABLE bonus');
        $this->addSql('DROP TABLE company_event');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE payroll');
        $this->addSql('DROP TABLE purchase_order');
        $this->addSql('DROP TABLE purchase_order_purchase_order_item');
        $this->addSql('DROP TABLE purchase_order_item');
    }
}
