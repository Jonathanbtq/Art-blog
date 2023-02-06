<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230206194706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnements ADD sender_id INT NOT NULL, ADD recipient_id INT NOT NULL');
        $this->addSql('ALTER TABLE abonnements ADD CONSTRAINT FK_4788B767F624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE abonnements ADD CONSTRAINT FK_4788B767E92F8F78 FOREIGN KEY (recipient_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4788B767F624B39D ON abonnements (sender_id)');
        $this->addSql('CREATE INDEX IDX_4788B767E92F8F78 ON abonnements (recipient_id)');
        $this->addSql('ALTER TABLE user DROP sent_id, DROP received_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnements DROP FOREIGN KEY FK_4788B767F624B39D');
        $this->addSql('ALTER TABLE abonnements DROP FOREIGN KEY FK_4788B767E92F8F78');
        $this->addSql('DROP INDEX IDX_4788B767F624B39D ON abonnements');
        $this->addSql('DROP INDEX IDX_4788B767E92F8F78 ON abonnements');
        $this->addSql('ALTER TABLE abonnements DROP sender_id, DROP recipient_id');
        $this->addSql('ALTER TABLE user ADD sent_id INT NOT NULL, ADD received_id INT NOT NULL');
    }
}
