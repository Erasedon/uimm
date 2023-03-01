<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301101921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation_code_formation (formation_id INT NOT NULL, code_formation_id INT NOT NULL, INDEX IDX_3B51290A5200282E (formation_id), INDEX IDX_3B51290A9928DA4B (code_formation_id), PRIMARY KEY(formation_id, code_formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation_code_formation ADD CONSTRAINT FK_3B51290A5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_code_formation ADD CONSTRAINT FK_3B51290A9928DA4B FOREIGN KEY (code_formation_id) REFERENCES code_formation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation_code_formation DROP FOREIGN KEY FK_3B51290A5200282E');
        $this->addSql('ALTER TABLE formation_code_formation DROP FOREIGN KEY FK_3B51290A9928DA4B');
        $this->addSql('DROP TABLE formation_code_formation');
    }
}
