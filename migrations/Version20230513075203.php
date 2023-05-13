<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230513075203 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE retrait (id INT AUTO_INCREMENT NOT NULL, numerode_compte_id INT DEFAULT NULL, numerode_cheque VARCHAR(8) NOT NULL, montantde_retrait INT NOT NULL, datede_retrait VARCHAR(255) NOT NULL, INDEX IDX_D9846A513CD3B918 (numerode_compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE retrait ADD CONSTRAINT FK_D9846A513CD3B918 FOREIGN KEY (numerode_compte_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE retrait DROP FOREIGN KEY FK_D9846A513CD3B918');
        $this->addSql('DROP TABLE retrait');
    }
}
