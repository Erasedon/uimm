<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230302105517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE domaine_formation (domaine_id INT NOT NULL, formation_id INT NOT NULL, INDEX IDX_569B8F7F4272FC9F (domaine_id), INDEX IDX_569B8F7F5200282E (formation_id), PRIMARY KEY(domaine_id, formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE domaine_formation ADD CONSTRAINT FK_569B8F7F4272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE domaine_formation ADD CONSTRAINT FK_569B8F7F5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE domaine_formation DROP FOREIGN KEY FK_569B8F7F4272FC9F');
        $this->addSql('ALTER TABLE domaine_formation DROP FOREIGN KEY FK_569B8F7F5200282E');
        $this->addSql('DROP TABLE domaine_formation');
    }
}
