<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301100332 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation_domaine (formation_id INT NOT NULL, domaine_id INT NOT NULL, INDEX IDX_3D504FB75200282E (formation_id), INDEX IDX_3D504FB74272FC9F (domaine_id), PRIMARY KEY(formation_id, domaine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation_domaine ADD CONSTRAINT FK_3D504FB75200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_domaine ADD CONSTRAINT FK_3D504FB74272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation_domaine DROP FOREIGN KEY FK_3D504FB75200282E');
        $this->addSql('ALTER TABLE formation_domaine DROP FOREIGN KEY FK_3D504FB74272FC9F');
        $this->addSql('DROP TABLE formation_domaine');
    }
}
