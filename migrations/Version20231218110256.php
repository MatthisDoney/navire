<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218110256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE port ADD idpays INT NOT NULL');
        $this->addSql('ALTER TABLE port ADD CONSTRAINT FK_43915DCCE750CD0E FOREIGN KEY (idpays) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_43915DCCE750CD0E ON port (idpays)');
        $this->addSql('ALTER TABLE porttypecompatible DROP FOREIGN KEY FK_2C02FFDBCC8083CB');
        $this->addSql('DROP INDEX IDX_2C02FFDBCC8083CB ON porttypecompatible');
        $this->addSql('DROP INDEX `primary` ON porttypecompatible');
        $this->addSql('ALTER TABLE porttypecompatible CHANGE idsport idport INT NOT NULL');
        $this->addSql('ALTER TABLE porttypecompatible ADD CONSTRAINT FK_2C02FFDB905EAC6C FOREIGN KEY (idport) REFERENCES port (id)');
        $this->addSql('CREATE INDEX IDX_2C02FFDB905EAC6C ON porttypecompatible (idport)');
        $this->addSql('ALTER TABLE porttypecompatible ADD PRIMARY KEY (idport, ais_ship_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE port DROP FOREIGN KEY FK_43915DCCE750CD0E');
        $this->addSql('DROP INDEX IDX_43915DCCE750CD0E ON port');
        $this->addSql('ALTER TABLE port DROP idpays');
        $this->addSql('ALTER TABLE porttypecompatible DROP FOREIGN KEY FK_2C02FFDB905EAC6C');
        $this->addSql('DROP INDEX IDX_2C02FFDB905EAC6C ON porttypecompatible');
        $this->addSql('DROP INDEX `PRIMARY` ON porttypecompatible');
        $this->addSql('ALTER TABLE porttypecompatible CHANGE idport idsport INT NOT NULL');
        $this->addSql('ALTER TABLE porttypecompatible ADD CONSTRAINT FK_2C02FFDBCC8083CB FOREIGN KEY (idsport) REFERENCES port (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2C02FFDBCC8083CB ON porttypecompatible (idsport)');
        $this->addSql('ALTER TABLE porttypecompatible ADD PRIMARY KEY (idsport, ais_ship_type_id)');
    }
}
