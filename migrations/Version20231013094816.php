<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231013094816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address_billing (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, address_line1 VARCHAR(255) DEFAULT NULL, address_line2 VARCHAR(255) DEFAULT NULL, city VARCHAR(100) DEFAULT NULL, zipcode INT DEFAULT NULL, phone INT DEFAULT NULL, UNIQUE INDEX UNIQ_B7C7BB32F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address_shipping (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, address_line1 VARCHAR(255) DEFAULT NULL, city VARCHAR(100) DEFAULT NULL, zipcode INT DEFAULT NULL, phone INT DEFAULT NULL, UNIQUE INDEX UNIQ_D393E9A5F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(50) DEFAULT NULL, lastname VARCHAR(50) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, payment_method_id INT DEFAULT NULL, client_id INT DEFAULT NULL, address_billing_id INT DEFAULT NULL, addressshipping_id INT DEFAULT NULL, product VARCHAR(255) DEFAULT NULL, status VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_F52993985AA1164F (payment_method_id), INDEX IDX_F529939819EB6921 (client_id), UNIQUE INDEX UNIQ_F5299398439FD419 (address_billing_id), UNIQUE INDEX UNIQ_F529939853518B1E (addressshipping_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment_method (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address_billing ADD CONSTRAINT FK_B7C7BB32F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE address_shipping ADD CONSTRAINT FK_D393E9A5F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993985AA1164F FOREIGN KEY (payment_method_id) REFERENCES payment_method (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939819EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398439FD419 FOREIGN KEY (address_billing_id) REFERENCES address_billing (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939853518B1E FOREIGN KEY (addressshipping_id) REFERENCES address_shipping (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address_billing DROP FOREIGN KEY FK_B7C7BB32F92F3E70');
        $this->addSql('ALTER TABLE address_shipping DROP FOREIGN KEY FK_D393E9A5F92F3E70');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993985AA1164F');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939819EB6921');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398439FD419');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939853518B1E');
        $this->addSql('DROP TABLE address_billing');
        $this->addSql('DROP TABLE address_shipping');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE payment_method');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
