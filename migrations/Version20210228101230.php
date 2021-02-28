<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210228101230 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP prenom, DROP numeroTel, DROP entreprise');
        $this->addSql('ALTER TABLE contact CHANGE idContact idContact INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD prenom VARCHAR(45) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, ADD numeroTel INT NOT NULL, ADD entreprise VARCHAR(45) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE contact CHANGE idContact idContact INT NOT NULL');
    }
}
