<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301094630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation_frais_scolarite (formation_id INT NOT NULL, frais_scolarite_id INT NOT NULL, INDEX IDX_A7E2B6835200282E (formation_id), INDEX IDX_A7E2B683F40B33B5 (frais_scolarite_id), PRIMARY KEY(formation_id, frais_scolarite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation_frais_scolarite ADD CONSTRAINT FK_A7E2B6835200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_frais_scolarite ADD CONSTRAINT FK_A7E2B683F40B33B5 FOREIGN KEY (frais_scolarite_id) REFERENCES frais_scolarite (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation_frais_scolarite DROP FOREIGN KEY FK_A7E2B6835200282E');
        $this->addSql('ALTER TABLE formation_frais_scolarite DROP FOREIGN KEY FK_A7E2B683F40B33B5');
        $this->addSql('DROP TABLE formation_frais_scolarite');
    }
}
