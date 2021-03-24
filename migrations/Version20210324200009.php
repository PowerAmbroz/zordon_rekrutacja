<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324200009 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE49A21E10');
        $this->addSql('DROP INDEX IDX_E52FFDEE49A21E10 ON orders');
        $this->addSql('ALTER TABLE orders DROP realestate_id');
        $this->addSql('ALTER TABLE realestate ADD orders_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE realestate ADD CONSTRAINT FK_6A1DC483CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('CREATE INDEX IDX_6A1DC483CFFE9AD6 ON realestate (orders_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders ADD realestate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE49A21E10 FOREIGN KEY (realestate_id) REFERENCES realestate (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE49A21E10 ON orders (realestate_id)');
        $this->addSql('ALTER TABLE realestate DROP FOREIGN KEY FK_6A1DC483CFFE9AD6');
        $this->addSql('DROP INDEX IDX_6A1DC483CFFE9AD6 ON realestate');
        $this->addSql('ALTER TABLE realestate DROP orders_id');
    }
}
