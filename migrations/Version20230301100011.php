<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301100011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stats ADD obtenir_formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stats ADD CONSTRAINT FK_574767AA275C2DFD FOREIGN KEY (obtenir_formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_574767AA275C2DFD ON stats (obtenir_formation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stats DROP FOREIGN KEY FK_574767AA275C2DFD');
        $this->addSql('DROP INDEX IDX_574767AA275C2DFD ON stats');
        $this->addSql('ALTER TABLE stats DROP obtenir_formation_id');
    }
}
