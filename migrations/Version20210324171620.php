<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324171620 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE building_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, real_estate_id INT DEFAULT NULL, assignee VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, inspection_date VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E52FFDEE1E4EB97C (real_estate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realestate (id INT AUTO_INCREMENT NOT NULL, type_id_id INT DEFAULT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_6A1DC483714819A0 (type_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE1E4EB97C FOREIGN KEY (real_estate_id) REFERENCES realestate (id)');
        $this->addSql('ALTER TABLE realestate ADD CONSTRAINT FK_6A1DC483714819A0 FOREIGN KEY (type_id_id) REFERENCES building_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE realestate DROP FOREIGN KEY FK_6A1DC483714819A0');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE1E4EB97C');
        $this->addSql('DROP TABLE building_type');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE realestate');
    }
}
