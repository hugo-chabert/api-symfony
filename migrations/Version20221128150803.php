<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128150803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs ADD groupe_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315E7A45358C FOREIGN KEY (groupe_id) REFERENCES `groups` (id)');
        $this->addSql('CREATE INDEX IDX_497B315E7A45358C ON utilisateurs (groupe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315E7A45358C');
        $this->addSql('DROP INDEX IDX_497B315E7A45358C ON utilisateurs');
        $this->addSql('ALTER TABLE utilisateurs DROP groupe_id');
    }
}
