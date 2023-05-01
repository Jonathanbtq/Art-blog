<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230501132500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pays');
        $this->addSql('ALTER TABLE user ADD first_connect DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pays (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, code INT NOT NULL, alpha2 VARCHAR(2) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, alpha3 VARCHAR(3) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, nom_en_gb VARCHAR(45) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, nom_fr_fr VARCHAR(45) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, UNIQUE INDEX alpha2 (alpha2), UNIQUE INDEX alpha3 (alpha3), UNIQUE INDEX code_unique (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user DROP first_connect');
    }
}
