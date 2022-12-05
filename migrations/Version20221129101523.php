<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221129101523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD my_group_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CC064C08 FOREIGN KEY (my_group_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649CC064C08 ON user (my_group_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CC064C08');
        $this->addSql('DROP INDEX IDX_8D93D649CC064C08 ON user');
        $this->addSql('ALTER TABLE user DROP my_group_id');
    }
}
