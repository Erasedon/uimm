<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301101657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation_metier_vise (formation_id INT NOT NULL, metier_vise_id INT NOT NULL, INDEX IDX_EFA08BEA5200282E (formation_id), INDEX IDX_EFA08BEA1BC1024C (metier_vise_id), PRIMARY KEY(formation_id, metier_vise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation_metier_vise ADD CONSTRAINT FK_EFA08BEA5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_metier_vise ADD CONSTRAINT FK_EFA08BEA1BC1024C FOREIGN KEY (metier_vise_id) REFERENCES metier_vise (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation_metier_vise DROP FOREIGN KEY FK_EFA08BEA5200282E');
        $this->addSql('ALTER TABLE formation_metier_vise DROP FOREIGN KEY FK_EFA08BEA1BC1024C');
        $this->addSql('DROP TABLE formation_metier_vise');
    }
}
