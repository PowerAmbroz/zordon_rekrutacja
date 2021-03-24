<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324180237 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE realestate DROP FOREIGN KEY FK_6A1DC483714819A0');
        $this->addSql('DROP TABLE building_type');
        $this->addSql('DROP INDEX UNIQ_6A1DC483714819A0 ON realestate');
        $this->addSql('ALTER TABLE realestate ADD type VARCHAR(255) NOT NULL, DROP type_id_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE building_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE realestate ADD type_id_id INT DEFAULT NULL, DROP type');
        $this->addSql('ALTER TABLE realestate ADD CONSTRAINT FK_6A1DC483714819A0 FOREIGN KEY (type_id_id) REFERENCES building_type (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6A1DC483714819A0 ON realestate (type_id_id)');
    }
}
