<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210610070950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE family (id INT AUTO_INCREMENT NOT NULL, social_category_id INT NOT NULL, id_user_id INT NOT NULL, number_member SMALLINT NOT NULL, qtl SMALLINT NOT NULL, INDEX IDX_A5E6215B67E26DCC (social_category_id), UNIQUE INDEX UNIQ_A5E6215B79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorite_brand (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, first_fav_id INT NOT NULL, second_fav_id INT DEFAULT NULL, third_fav_id INT NOT NULL, UNIQUE INDEX UNIQ_AADAD27C79F37AE5 (id_user_id), UNIQUE INDEX UNIQ_AADAD27CFC9D5A63 (first_fav_id), UNIQUE INDEX UNIQ_AADAD27CE957DEE5 (second_fav_id), UNIQUE INDEX UNIQ_AADAD27C69BEA9B7 (third_fav_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE social_category (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON DEFAULT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, age SMALLINT NOT NULL, gender VARCHAR(255) NOT NULL, qtl SMALLINT NOT NULL, nb_balls SMALLINT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE family ADD CONSTRAINT FK_A5E6215B67E26DCC FOREIGN KEY (social_category_id) REFERENCES social_category (id)');
        $this->addSql('ALTER TABLE family ADD CONSTRAINT FK_A5E6215B79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favorite_brand ADD CONSTRAINT FK_AADAD27C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favorite_brand ADD CONSTRAINT FK_AADAD27CFC9D5A63 FOREIGN KEY (first_fav_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE favorite_brand ADD CONSTRAINT FK_AADAD27CE957DEE5 FOREIGN KEY (second_fav_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE favorite_brand ADD CONSTRAINT FK_AADAD27C69BEA9B7 FOREIGN KEY (third_fav_id) REFERENCES brand (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favorite_brand DROP FOREIGN KEY FK_AADAD27CFC9D5A63');
        $this->addSql('ALTER TABLE favorite_brand DROP FOREIGN KEY FK_AADAD27CE957DEE5');
        $this->addSql('ALTER TABLE favorite_brand DROP FOREIGN KEY FK_AADAD27C69BEA9B7');
        $this->addSql('ALTER TABLE family DROP FOREIGN KEY FK_A5E6215B67E26DCC');
        $this->addSql('ALTER TABLE family DROP FOREIGN KEY FK_A5E6215B79F37AE5');
        $this->addSql('ALTER TABLE favorite_brand DROP FOREIGN KEY FK_AADAD27C79F37AE5');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE family');
        $this->addSql('DROP TABLE favorite_brand');
        $this->addSql('DROP TABLE social_category');
        $this->addSql('DROP TABLE user');
    }
}
