<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230201162313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668AFFB3979');
        $this->addSql('DROP INDEX IDX_3AF34668AFFB3979 ON categories');
        $this->addSql('ALTER TABLE categories DROP publications_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories ADD publications_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668AFFB3979 FOREIGN KEY (publications_id) REFERENCES publications (id)');
        $this->addSql('CREATE INDEX IDX_3AF34668AFFB3979 ON categories (publications_id)');
    }
}
