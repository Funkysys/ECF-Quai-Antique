<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230125134024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allergy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_C7440455A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_allergy (client_id INT NOT NULL, allergy_id INT NOT NULL, INDEX IDX_998C06C819EB6921 (client_id), INDEX IDX_998C06C8DBFD579D (allergy_id), PRIMARY KEY(client_id, allergy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE days (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dish (id INT AUTO_INCREMENT NOT NULL, sub_cat_id INT DEFAULT NULL, category_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, INDEX IDX_957D8CB854FCE60F (sub_cat_id), INDEX IDX_957D8CB812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formulas (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hours (id INT AUTO_INCREMENT NOT NULL, hour INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, image_name VARCHAR(255) NOT NULL, image_size VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', image_alt VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_formulas (menu_id INT NOT NULL, formulas_id INT NOT NULL, INDEX IDX_AD870873CCD7E912 (menu_id), INDEX IDX_AD870873E30F9153 (formulas_id), PRIMARY KEY(menu_id, formulas_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE minutes (id INT AUTO_INCREMENT NOT NULL, minutes INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening_hours (id INT AUTO_INCREMENT NOT NULL, day_id INT NOT NULL, opening_hours_id INT DEFAULT NULL, open_minutes_id INT DEFAULT NULL, close_hours_id INT DEFAULT NULL, close_minutes_id INT DEFAULT NULL, open TINYINT(1) NOT NULL, lunch TINYINT(1) NOT NULL, diner TINYINT(1) DEFAULT NULL, INDEX IDX_2640C10B9C24126 (day_id), INDEX IDX_2640C10BCE298D68 (opening_hours_id), INDEX IDX_2640C10B9CF098E5 (open_minutes_id), INDEX IDX_2640C10B54EA8D07 (close_hours_id), INDEX IDX_2640C10BF33AD6C8 (close_minutes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, capacity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_cat (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_A8028D912469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `table` (id INT AUTO_INCREMENT NOT NULL, nb_covers INT NOT NULL, hours INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_allergy (user_id INT NOT NULL, allergy_id INT NOT NULL, INDEX IDX_93BC5CBFA76ED395 (user_id), INDEX IDX_93BC5CBFDBFD579D (allergy_id), PRIMARY KEY(user_id, allergy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE client_allergy ADD CONSTRAINT FK_998C06C819EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_allergy ADD CONSTRAINT FK_998C06C8DBFD579D FOREIGN KEY (allergy_id) REFERENCES allergy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dish ADD CONSTRAINT FK_957D8CB854FCE60F FOREIGN KEY (sub_cat_id) REFERENCES sub_cat (id)');
        $this->addSql('ALTER TABLE dish ADD CONSTRAINT FK_957D8CB812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE menu_formulas ADD CONSTRAINT FK_AD870873CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE menu_formulas ADD CONSTRAINT FK_AD870873E30F9153 FOREIGN KEY (formulas_id) REFERENCES formulas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE opening_hours ADD CONSTRAINT FK_2640C10B9C24126 FOREIGN KEY (day_id) REFERENCES days (id)');
        $this->addSql('ALTER TABLE opening_hours ADD CONSTRAINT FK_2640C10BCE298D68 FOREIGN KEY (opening_hours_id) REFERENCES hours (id)');
        $this->addSql('ALTER TABLE opening_hours ADD CONSTRAINT FK_2640C10B9CF098E5 FOREIGN KEY (open_minutes_id) REFERENCES minutes (id)');
        $this->addSql('ALTER TABLE opening_hours ADD CONSTRAINT FK_2640C10B54EA8D07 FOREIGN KEY (close_hours_id) REFERENCES hours (id)');
        $this->addSql('ALTER TABLE opening_hours ADD CONSTRAINT FK_2640C10BF33AD6C8 FOREIGN KEY (close_minutes_id) REFERENCES minutes (id)');
        $this->addSql('ALTER TABLE sub_cat ADD CONSTRAINT FK_A8028D912469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE user_allergy ADD CONSTRAINT FK_93BC5CBFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_allergy ADD CONSTRAINT FK_93BC5CBFDBFD579D FOREIGN KEY (allergy_id) REFERENCES allergy (id) ON DELETE CASCADE');

        $allergns = array('Gluten', 'Peanuts', 'Milk', 'Eggs', 'Nuts', 'Mollusc', 'Seafood', 'Mustard', 'Fish', 'Celery', 'Soy', 'Sulphites', 'Sesame', 'Lupine');

        foreach ($allergns as $allergn) {
            $this->addSql('INSERT INTO allergy (name) VALUES (?)', array($allergn));
        }
        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

        foreach ($days as $day) {
            $this->addSql('INSERT INTO days (day) VALUES (?)', array($day));
        }

        $hours = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24);
        foreach ($hours as $hour) {
            $this->addSql('INSERT INTO hours (hour) VALUES (?)', array($hour));
        }

        $minutes = array(0, 15, 30, 45);

        foreach ($minutes as $minute) {
            $this->addSql('INSERT INTO minutes (minutes) VALUES (?)', array($minute));
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A76ED395');
        $this->addSql('ALTER TABLE client_allergy DROP FOREIGN KEY FK_998C06C819EB6921');
        $this->addSql('ALTER TABLE client_allergy DROP FOREIGN KEY FK_998C06C8DBFD579D');
        $this->addSql('ALTER TABLE dish DROP FOREIGN KEY FK_957D8CB854FCE60F');
        $this->addSql('ALTER TABLE dish DROP FOREIGN KEY FK_957D8CB812469DE2');
        $this->addSql('ALTER TABLE menu_formulas DROP FOREIGN KEY FK_AD870873CCD7E912');
        $this->addSql('ALTER TABLE menu_formulas DROP FOREIGN KEY FK_AD870873E30F9153');
        $this->addSql('ALTER TABLE opening_hours DROP FOREIGN KEY FK_2640C10B9C24126');
        $this->addSql('ALTER TABLE opening_hours DROP FOREIGN KEY FK_2640C10BCE298D68');
        $this->addSql('ALTER TABLE opening_hours DROP FOREIGN KEY FK_2640C10B9CF098E5');
        $this->addSql('ALTER TABLE opening_hours DROP FOREIGN KEY FK_2640C10B54EA8D07');
        $this->addSql('ALTER TABLE opening_hours DROP FOREIGN KEY FK_2640C10BF33AD6C8');
        $this->addSql('ALTER TABLE sub_cat DROP FOREIGN KEY FK_A8028D912469DE2');
        $this->addSql('ALTER TABLE user_allergy DROP FOREIGN KEY FK_93BC5CBFA76ED395');
        $this->addSql('ALTER TABLE user_allergy DROP FOREIGN KEY FK_93BC5CBFDBFD579D');
        $this->addSql('DROP TABLE allergy');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE client_allergy');
        $this->addSql('DROP TABLE days');
        $this->addSql('DROP TABLE dish');
        $this->addSql('DROP TABLE formulas');
        $this->addSql('DROP TABLE hours');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_formulas');
        $this->addSql('DROP TABLE minutes');
        $this->addSql('DROP TABLE opening_hours');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE sub_cat');
        $this->addSql('DROP TABLE `table`');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_allergy');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
