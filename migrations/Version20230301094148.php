<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301094148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation_condition (formation_id INT NOT NULL, condition_id INT NOT NULL, INDEX IDX_77ABD89E5200282E (formation_id), INDEX IDX_77ABD89E887793B6 (condition_id), PRIMARY KEY(formation_id, condition_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation_condition ADD CONSTRAINT FK_77ABD89E5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_condition ADD CONSTRAINT FK_77ABD89E887793B6 FOREIGN KEY (condition_id) REFERENCES `condition` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation_condition DROP FOREIGN KEY FK_77ABD89E5200282E');
        $this->addSql('ALTER TABLE formation_condition DROP FOREIGN KEY FK_77ABD89E887793B6');
        $this->addSql('DROP TABLE formation_condition');
    }
}
