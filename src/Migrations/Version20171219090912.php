<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171219090912 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE copyvore_user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, surname VARCHAR(32) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(32) NOT NULL, phone VARCHAR(10) DEFAULT NULL, street_number INT DEFAULT NULL, street VARCHAR(64) DEFAULT NULL, city VARCHAR(32) DEFAULT NULL, postcode VARCHAR(5) DEFAULT NULL, UNIQUE INDEX UNIQ_ADDDF926E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE copyvore_reload (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, admin_id INT NOT NULL, reload_type_id INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_EB0CA42AA76ED395 (user_id), INDEX IDX_EB0CA42A642B8210 (admin_id), INDEX IDX_EB0CA42ACC9E2974 (reload_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE copyvore_reload_type (id INT AUTO_INCREMENT NOT NULL, copy_type_id INT NOT NULL, number INT NOT NULL, unit_price NUMERIC(4, 2) NOT NULL, is_available TINYINT(1) DEFAULT \'1\' NOT NULL, INDEX IDX_2C134D86995A58F8 (copy_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE copyvore_order (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, admin_id INT NOT NULL, copy_type_id INT NOT NULL, number INT NOT NULL, label VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_2804A17EA76ED395 (user_id), INDEX IDX_2804A17E642B8210 (admin_id), INDEX IDX_2804A17E995A58F8 (copy_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE copyvore_copy_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(16) NOT NULL, UNIQUE INDEX UNIQ_51039C498CDE5729 (type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE copyvore_admin (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(32) NOT NULL, password VARCHAR(32) NOT NULL, UNIQUE INDEX UNIQ_55233F90AA08CB10 (login), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE copyvore_reload ADD CONSTRAINT FK_EB0CA42AA76ED395 FOREIGN KEY (user_id) REFERENCES copyvore_user (id)');
        $this->addSql('ALTER TABLE copyvore_reload ADD CONSTRAINT FK_EB0CA42A642B8210 FOREIGN KEY (admin_id) REFERENCES copyvore_admin (id)');
        $this->addSql('ALTER TABLE copyvore_reload ADD CONSTRAINT FK_EB0CA42ACC9E2974 FOREIGN KEY (reload_type_id) REFERENCES copyvore_reload_type (id)');
        $this->addSql('ALTER TABLE copyvore_reload_type ADD CONSTRAINT FK_2C134D86995A58F8 FOREIGN KEY (copy_type_id) REFERENCES copyvore_copy_type (id)');
        $this->addSql('ALTER TABLE copyvore_order ADD CONSTRAINT FK_2804A17EA76ED395 FOREIGN KEY (user_id) REFERENCES copyvore_user (id)');
        $this->addSql('ALTER TABLE copyvore_order ADD CONSTRAINT FK_2804A17E642B8210 FOREIGN KEY (admin_id) REFERENCES copyvore_admin (id)');
        $this->addSql('ALTER TABLE copyvore_order ADD CONSTRAINT FK_2804A17E995A58F8 FOREIGN KEY (copy_type_id) REFERENCES copyvore_copy_type (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE copyvore_reload DROP FOREIGN KEY FK_EB0CA42AA76ED395');
        $this->addSql('ALTER TABLE copyvore_order DROP FOREIGN KEY FK_2804A17EA76ED395');
        $this->addSql('ALTER TABLE copyvore_reload DROP FOREIGN KEY FK_EB0CA42ACC9E2974');
        $this->addSql('ALTER TABLE copyvore_reload_type DROP FOREIGN KEY FK_2C134D86995A58F8');
        $this->addSql('ALTER TABLE copyvore_order DROP FOREIGN KEY FK_2804A17E995A58F8');
        $this->addSql('ALTER TABLE copyvore_reload DROP FOREIGN KEY FK_EB0CA42A642B8210');
        $this->addSql('ALTER TABLE copyvore_order DROP FOREIGN KEY FK_2804A17E642B8210');
        $this->addSql('DROP TABLE copyvore_user');
        $this->addSql('DROP TABLE copyvore_reload');
        $this->addSql('DROP TABLE copyvore_reload_type');
        $this->addSql('DROP TABLE copyvore_order');
        $this->addSql('DROP TABLE copyvore_copy_type');
        $this->addSql('DROP TABLE copyvore_admin');
    }
}
