<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210323094244 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modulesdansplan ADD PosDebX DOUBLE PRECISION NOT NULL, ADD PosDebY DOUBLE PRECISION NOT NULL, ADD PosFinX DOUBLE PRECISION NOT NULL, ADD PosFinY DOUBLE PRECISION NOT NULL, ADD notes VARCHAR(255) DEFAULT NULL, ADD nom_dans_plan VARCHAR(255) NOT NULL, ADD rotation DOUBLE PRECISION DEFAULT NULL, ADD visible_dans_plan TINYINT(1) NOT NULL, DROP Quantite, DROP PosX, DROP PosY, DROP EpaisseurX, DROP EpaisseurY');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modulesdansplan ADD Quantite INT NOT NULL, ADD PosX DOUBLE PRECISION NOT NULL, ADD PosY DOUBLE PRECISION NOT NULL, ADD EpaisseurX DOUBLE PRECISION NOT NULL, ADD EpaisseurY DOUBLE PRECISION NOT NULL, DROP PosDebX, DROP PosDebY, DROP PosFinX, DROP PosFinY, DROP notes, DROP nom_dans_plan, DROP rotation, DROP visible_dans_plan');
    }
}
