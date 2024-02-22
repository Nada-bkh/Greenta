<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240221221426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application ADD jobid_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1A5AD980D FOREIGN KEY (jobid_id) REFERENCES job (id)');
        $this->addSql('CREATE INDEX IDX_A45BDDC1A5AD980D ON application (jobid_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1A5AD980D');
        $this->addSql('DROP INDEX IDX_A45BDDC1A5AD980D ON application');
        $this->addSql('ALTER TABLE application DROP jobid_id');
    }
}
