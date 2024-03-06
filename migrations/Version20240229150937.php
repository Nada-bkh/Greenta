<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229150937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE charity_donation (charity_id INT NOT NULL, donation_id INT NOT NULL, INDEX IDX_B28F5500F5C97E37 (charity_id), INDEX IDX_B28F55004DC1279C (donation_id), PRIMARY KEY(charity_id, donation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE charity_donation ADD CONSTRAINT FK_B28F5500F5C97E37 FOREIGN KEY (charity_id) REFERENCES charity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE charity_donation ADD CONSTRAINT FK_B28F55004DC1279C FOREIGN KEY (donation_id) REFERENCES donation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE charity_donation DROP FOREIGN KEY FK_B28F5500F5C97E37');
        $this->addSql('ALTER TABLE charity_donation DROP FOREIGN KEY FK_B28F55004DC1279C');
        $this->addSql('DROP TABLE charity_donation');
    }
}
