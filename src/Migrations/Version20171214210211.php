<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171214210211 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, admin_id INT NOT NULL, copy_type_id INT NOT NULL, created_at DATETIME NOT NULL, number INT NOT NULL, label VARCHAR(255) DEFAULT NULL, INDEX IDX_F5299398A76ED395 (user_id), INDEX IDX_F5299398642B8210 (admin_id), INDEX IDX_F5299398995A58F8 (copy_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(32) NOT NULL, password VARCHAR(32) NOT NULL, UNIQUE INDEX UNIQ_880E0D76AA08CB10 (login), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reload_type (id INT AUTO_INCREMENT NOT NULL, copy_type_id INT NOT NULL, number INT NOT NULL, unit_price NUMERIC(4, 2) NOT NULL, is_available TINYINT(1) DEFAULT \'1\' NOT NULL, INDEX IDX_E0E68F7F995A58F8 (copy_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reload (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, admin_id INT NOT NULL, reload_type_id INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_A2B8CE55A76ED395 (user_id), INDEX IDX_A2B8CE55642B8210 (admin_id), INDEX IDX_A2B8CE55CC9E2974 (reload_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE copy_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(16) NOT NULL, UNIQUE INDEX UNIQ_5DB047D58CDE5729 (type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, surname VARCHAR(32) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(32) NOT NULL, phone VARCHAR(10) DEFAULT NULL, street_number INT DEFAULT NULL, street VARCHAR(64) DEFAULT NULL, city VARCHAR(32) DEFAULT NULL, postcode VARCHAR(5) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398995A58F8 FOREIGN KEY (copy_type_id) REFERENCES copy_type (id)');
        $this->addSql('ALTER TABLE reload_type ADD CONSTRAINT FK_E0E68F7F995A58F8 FOREIGN KEY (copy_type_id) REFERENCES copy_type (id)');
        $this->addSql('ALTER TABLE reload ADD CONSTRAINT FK_A2B8CE55A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reload ADD CONSTRAINT FK_A2B8CE55642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE reload ADD CONSTRAINT FK_A2B8CE55CC9E2974 FOREIGN KEY (reload_type_id) REFERENCES reload_type (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398642B8210');
        $this->addSql('ALTER TABLE reload DROP FOREIGN KEY FK_A2B8CE55642B8210');
        $this->addSql('ALTER TABLE reload DROP FOREIGN KEY FK_A2B8CE55CC9E2974');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398995A58F8');
        $this->addSql('ALTER TABLE reload_type DROP FOREIGN KEY FK_E0E68F7F995A58F8');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A76ED395');
        $this->addSql('ALTER TABLE reload DROP FOREIGN KEY FK_A2B8CE55A76ED395');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE reload_type');
        $this->addSql('DROP TABLE reload');
        $this->addSql('DROP TABLE copy_type');
        $this->addSql('DROP TABLE user');
    }
}
