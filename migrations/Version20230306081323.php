<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230306081323 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE code_formation (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `condition` (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domaine (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, titre VARCHAR(255) NOT NULL, resume VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, url VARCHAR(255) DEFAULT NULL, duree_heure INT DEFAULT NULL, duree_hentreprise INT DEFAULT NULL, duree_mois VARCHAR(50) NOT NULL, image VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, INDEX IDX_404021BFB3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_condition (formation_id INT NOT NULL, condition_id INT NOT NULL, INDEX IDX_77ABD89E5200282E (formation_id), INDEX IDX_77ABD89E887793B6 (condition_id), PRIMARY KEY(formation_id, condition_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_frais_scolarite (formation_id INT NOT NULL, frais_scolarite_id INT NOT NULL, INDEX IDX_A7E2B6835200282E (formation_id), INDEX IDX_A7E2B683F40B33B5 (frais_scolarite_id), PRIMARY KEY(formation_id, frais_scolarite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_type_formation (formation_id INT NOT NULL, type_formation_id INT NOT NULL, INDEX IDX_23D210225200282E (formation_id), INDEX IDX_23D21022D543922B (type_formation_id), PRIMARY KEY(formation_id, type_formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_domaine (formation_id INT NOT NULL, domaine_id INT NOT NULL, INDEX IDX_3D504FB75200282E (formation_id), INDEX IDX_3D504FB74272FC9F (domaine_id), PRIMARY KEY(formation_id, domaine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_metier_vise (formation_id INT NOT NULL, metier_vise_id INT NOT NULL, INDEX IDX_EFA08BEA5200282E (formation_id), INDEX IDX_EFA08BEA1BC1024C (metier_vise_id), PRIMARY KEY(formation_id, metier_vise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_code_formation (formation_id INT NOT NULL, code_formation_id INT NOT NULL, INDEX IDX_3B51290A5200282E (formation_id), INDEX IDX_3B51290A9928DA4B (code_formation_id), PRIMARY KEY(formation_id, code_formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_lieu (formation_id INT NOT NULL, lieu_id INT NOT NULL, INDEX IDX_788898195200282E (formation_id), INDEX IDX_788898196AB213CC (lieu_id), PRIMARY KEY(formation_id, lieu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE frais_scolarite (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE metier_vise (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stats (id INT AUTO_INCREMENT NOT NULL, obtenir_formation_id INT DEFAULT NULL, annee VARCHAR(50) NOT NULL, taux INT NOT NULL, INDEX IDX_574767AA275C2DFD (obtenir_formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_formation (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE formation_condition ADD CONSTRAINT FK_77ABD89E5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_condition ADD CONSTRAINT FK_77ABD89E887793B6 FOREIGN KEY (condition_id) REFERENCES `condition` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_frais_scolarite ADD CONSTRAINT FK_A7E2B6835200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_frais_scolarite ADD CONSTRAINT FK_A7E2B683F40B33B5 FOREIGN KEY (frais_scolarite_id) REFERENCES frais_scolarite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_type_formation ADD CONSTRAINT FK_23D210225200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_type_formation ADD CONSTRAINT FK_23D21022D543922B FOREIGN KEY (type_formation_id) REFERENCES type_formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_domaine ADD CONSTRAINT FK_3D504FB75200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_domaine ADD CONSTRAINT FK_3D504FB74272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_metier_vise ADD CONSTRAINT FK_EFA08BEA5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_metier_vise ADD CONSTRAINT FK_EFA08BEA1BC1024C FOREIGN KEY (metier_vise_id) REFERENCES metier_vise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_code_formation ADD CONSTRAINT FK_3B51290A5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_code_formation ADD CONSTRAINT FK_3B51290A9928DA4B FOREIGN KEY (code_formation_id) REFERENCES code_formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_lieu ADD CONSTRAINT FK_788898195200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_lieu ADD CONSTRAINT FK_788898196AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stats ADD CONSTRAINT FK_574767AA275C2DFD FOREIGN KEY (obtenir_formation_id) REFERENCES formation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFB3E9C81');
        $this->addSql('ALTER TABLE formation_condition DROP FOREIGN KEY FK_77ABD89E5200282E');
        $this->addSql('ALTER TABLE formation_condition DROP FOREIGN KEY FK_77ABD89E887793B6');
        $this->addSql('ALTER TABLE formation_frais_scolarite DROP FOREIGN KEY FK_A7E2B6835200282E');
        $this->addSql('ALTER TABLE formation_frais_scolarite DROP FOREIGN KEY FK_A7E2B683F40B33B5');
        $this->addSql('ALTER TABLE formation_type_formation DROP FOREIGN KEY FK_23D210225200282E');
        $this->addSql('ALTER TABLE formation_type_formation DROP FOREIGN KEY FK_23D21022D543922B');
        $this->addSql('ALTER TABLE formation_domaine DROP FOREIGN KEY FK_3D504FB75200282E');
        $this->addSql('ALTER TABLE formation_domaine DROP FOREIGN KEY FK_3D504FB74272FC9F');
        $this->addSql('ALTER TABLE formation_metier_vise DROP FOREIGN KEY FK_EFA08BEA5200282E');
        $this->addSql('ALTER TABLE formation_metier_vise DROP FOREIGN KEY FK_EFA08BEA1BC1024C');
        $this->addSql('ALTER TABLE formation_code_formation DROP FOREIGN KEY FK_3B51290A5200282E');
        $this->addSql('ALTER TABLE formation_code_formation DROP FOREIGN KEY FK_3B51290A9928DA4B');
        $this->addSql('ALTER TABLE formation_lieu DROP FOREIGN KEY FK_788898195200282E');
        $this->addSql('ALTER TABLE formation_lieu DROP FOREIGN KEY FK_788898196AB213CC');
        $this->addSql('ALTER TABLE stats DROP FOREIGN KEY FK_574767AA275C2DFD');
        $this->addSql('DROP TABLE code_formation');
        $this->addSql('DROP TABLE `condition`');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_condition');
        $this->addSql('DROP TABLE formation_frais_scolarite');
        $this->addSql('DROP TABLE formation_type_formation');
        $this->addSql('DROP TABLE formation_domaine');
        $this->addSql('DROP TABLE formation_metier_vise');
        $this->addSql('DROP TABLE formation_code_formation');
        $this->addSql('DROP TABLE formation_lieu');
        $this->addSql('DROP TABLE frais_scolarite');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE metier_vise');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE stats');
        $this->addSql('DROP TABLE type_formation');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
