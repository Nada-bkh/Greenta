<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229150553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE charity CHANGE total_of_donation total_of_donation DOUBLE PRECISION NOT NULL, CHANGE last_date last_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE donation DROP FOREIGN KEY FK_31E581A0F5C97E37');
        $this->addSql('DROP INDEX UNIQ_31E581A0F5C97E37 ON donation');
        $this->addSql('ALTER TABLE donation DROP charity_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE charity CHANGE total_of_donation total_of_donation DOUBLE PRECISION DEFAULT NULL, CHANGE last_date last_date DATE NOT NULL');
        $this->addSql('ALTER TABLE donation ADD charity_id INT NOT NULL');
        $this->addSql('ALTER TABLE donation ADD CONSTRAINT FK_31E581A0F5C97E37 FOREIGN KEY (charity_id) REFERENCES charity (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_31E581A0F5C97E37 ON donation (charity_id)');
    }
}
