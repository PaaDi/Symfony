<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210319090306 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE variants_dans_devis (id_variant_dans_devis INT AUTO_INCREMENT NOT NULL, idTypevariant INT NOT NULL, idVariant INT NOT NULL, idDevis INT NOT NULL, PRIMARY KEY(id_variant_dans_devis)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chantier ADD refChantier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client ADD refClient VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE composants ADD refComposant VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE contact ADD refContact VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE devis ADD refDevis VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE fournisseur ADD refFournisseur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE gamme ADD refGamme VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE login ADD refLogin VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE modalitespaiement ADD refModalitespaiement VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE module ADD refModule VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE plan ADD refPlan VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE projet ADD refProjet VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE typevariants ADD refTypevariants VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE userrole ADD refuserrole VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE variants_dans_devis');
        $this->addSql('ALTER TABLE chantier DROP refChantier');
        $this->addSql('ALTER TABLE client DROP refClient');
        $this->addSql('ALTER TABLE composants DROP refComposant');
        $this->addSql('ALTER TABLE contact DROP refContact');
        $this->addSql('ALTER TABLE devis DROP refDevis');
        $this->addSql('ALTER TABLE fournisseur DROP refFournisseur');
        $this->addSql('ALTER TABLE gamme DROP refGamme');
        $this->addSql('ALTER TABLE login DROP refLogin');
        $this->addSql('ALTER TABLE modalitespaiement DROP refModalitespaiement');
        $this->addSql('ALTER TABLE module DROP refModule');
        $this->addSql('ALTER TABLE plan DROP refPlan');
        $this->addSql('ALTER TABLE projet DROP refProjet');
        $this->addSql('ALTER TABLE typevariants DROP refTypevariants');
        $this->addSql('ALTER TABLE userrole DROP refuserrole');
    }
}
