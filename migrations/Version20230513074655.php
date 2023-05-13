<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230513074655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE versement (id INT AUTO_INCREMENT NOT NULL, numerode_compte_id INT DEFAULT NULL, montant_verser INT NOT NULL, date_versement VARCHAR(10) NOT NULL, INDEX IDX_716E93673CD3B918 (numerode_compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE versement ADD CONSTRAINT FK_716E93673CD3B918 FOREIGN KEY (numerode_compte_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE versement DROP FOREIGN KEY FK_716E93673CD3B918');
        $this->addSql('DROP TABLE versement');
    }
}
