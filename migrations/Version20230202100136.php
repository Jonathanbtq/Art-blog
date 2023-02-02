<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230202100136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_publication (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_publication_categories (category_publication_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_29CDC635D9A2549A (category_publication_id), INDEX IDX_29CDC635A21214B7 (categories_id), PRIMARY KEY(category_publication_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_publication_publications (category_publication_id INT NOT NULL, publications_id INT NOT NULL, INDEX IDX_D0D589F3D9A2549A (category_publication_id), INDEX IDX_D0D589F3AFFB3979 (publications_id), PRIMARY KEY(category_publication_id, publications_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_publication_categories ADD CONSTRAINT FK_29CDC635D9A2549A FOREIGN KEY (category_publication_id) REFERENCES category_publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_publication_categories ADD CONSTRAINT FK_29CDC635A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_publication_publications ADD CONSTRAINT FK_D0D589F3D9A2549A FOREIGN KEY (category_publication_id) REFERENCES category_publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_publication_publications ADD CONSTRAINT FK_D0D589F3AFFB3979 FOREIGN KEY (publications_id) REFERENCES publications (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_publication_categories DROP FOREIGN KEY FK_29CDC635D9A2549A');
        $this->addSql('ALTER TABLE category_publication_categories DROP FOREIGN KEY FK_29CDC635A21214B7');
        $this->addSql('ALTER TABLE category_publication_publications DROP FOREIGN KEY FK_D0D589F3D9A2549A');
        $this->addSql('ALTER TABLE category_publication_publications DROP FOREIGN KEY FK_D0D589F3AFFB3979');
        $this->addSql('DROP TABLE category_publication');
        $this->addSql('DROP TABLE category_publication_categories');
        $this->addSql('DROP TABLE category_publication_publications');
    }
}
