<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301102231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation_lieu (formation_id INT NOT NULL, lieu_id INT NOT NULL, INDEX IDX_788898195200282E (formation_id), INDEX IDX_788898196AB213CC (lieu_id), PRIMARY KEY(formation_id, lieu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation_lieu ADD CONSTRAINT FK_788898195200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_lieu ADD CONSTRAINT FK_788898196AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation_lieu DROP FOREIGN KEY FK_788898195200282E');
        $this->addSql('ALTER TABLE formation_lieu DROP FOREIGN KEY FK_788898196AB213CC');
        $this->addSql('DROP TABLE formation_lieu');
    }
}
