<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230130124014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publications ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE publications ADD CONSTRAINT FK_32783AF4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_32783AF4A76ED395 ON publications (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publications DROP FOREIGN KEY FK_32783AF4A76ED395');
        $this->addSql('DROP INDEX IDX_32783AF4A76ED395 ON publications');
        $this->addSql('ALTER TABLE publications DROP user_id');
    }
}
