<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200606122313 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE beer_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE malt (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, ebc INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hop (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, category INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe (id INT AUTO_INCREMENT NOT NULL, yeast_id INT NOT NULL, type_id INT NOT NULL, name VARCHAR(255) NOT NULL, mash_time INT NOT NULL, boiling_time INT NOT NULL, abv INT NOT NULL, INDEX IDX_DA88B137F345B99 (yeast_id), INDEX IDX_DA88B137C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE malt_quantity (id INT AUTO_INCREMENT NOT NULL, malt_id INT NOT NULL, recipe_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_70ABA20953A9F01 (malt_id), INDEX IDX_70ABA2059D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hop_quantity (id INT AUTO_INCREMENT NOT NULL, hop_id INT NOT NULL, recipe_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_37D47C07BC3870B6 (hop_id), INDEX IDX_37D47C0759D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE yeast (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137F345B99 FOREIGN KEY (yeast_id) REFERENCES yeast (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137C54C8C93 FOREIGN KEY (type_id) REFERENCES beer_type (id)');
        $this->addSql('ALTER TABLE malt_quantity ADD CONSTRAINT FK_70ABA20953A9F01 FOREIGN KEY (malt_id) REFERENCES malt (id)');
        $this->addSql('ALTER TABLE malt_quantity ADD CONSTRAINT FK_70ABA2059D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE hop_quantity ADD CONSTRAINT FK_37D47C07BC3870B6 FOREIGN KEY (hop_id) REFERENCES hop (id)');
        $this->addSql('ALTER TABLE hop_quantity ADD CONSTRAINT FK_37D47C0759D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137C54C8C93');
        $this->addSql('ALTER TABLE malt_quantity DROP FOREIGN KEY FK_70ABA20953A9F01');
        $this->addSql('ALTER TABLE hop_quantity DROP FOREIGN KEY FK_37D47C07BC3870B6');
        $this->addSql('ALTER TABLE malt_quantity DROP FOREIGN KEY FK_70ABA2059D8A214');
        $this->addSql('ALTER TABLE hop_quantity DROP FOREIGN KEY FK_37D47C0759D8A214');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137F345B99');
        $this->addSql('DROP TABLE beer_type');
        $this->addSql('DROP TABLE malt');
        $this->addSql('DROP TABLE hop');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE malt_quantity');
        $this->addSql('DROP TABLE hop_quantity');
        $this->addSql('DROP TABLE yeast');
    }
}
