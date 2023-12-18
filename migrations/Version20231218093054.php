<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218093054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(70) NOT NULL, indicatif VARCHAR(3) NOT NULL, INDEX ind_indicatif (indicatif), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE navire ADD pavillon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED10388D2618A0 FOREIGN KEY (pavillon_id) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_EED10388D2618A0 ON navire (pavillon_id)');
        $this->addSql('CREATE INDEX ind_IMO ON navire (imo)');
        $this->addSql('CREATE INDEX ind_MMSI ON navire (mmsi)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED10388D2618A0');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP INDEX IDX_EED10388D2618A0 ON navire');
        $this->addSql('DROP INDEX ind_IMO ON navire');
        $this->addSql('DROP INDEX ind_MMSI ON navire');
        $this->addSql('ALTER TABLE navire DROP pavillon_id');
    }
}
