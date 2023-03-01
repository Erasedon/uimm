<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301095359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation_type_formation (formation_id INT NOT NULL, type_formation_id INT NOT NULL, INDEX IDX_23D210225200282E (formation_id), INDEX IDX_23D21022D543922B (type_formation_id), PRIMARY KEY(formation_id, type_formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation_type_formation ADD CONSTRAINT FK_23D210225200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_type_formation ADD CONSTRAINT FK_23D21022D543922B FOREIGN KEY (type_formation_id) REFERENCES type_formation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation_type_formation DROP FOREIGN KEY FK_23D210225200282E');
        $this->addSql('ALTER TABLE formation_type_formation DROP FOREIGN KEY FK_23D21022D543922B');
        $this->addSql('DROP TABLE formation_type_formation');
    }
}
