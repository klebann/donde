CREATE TABLE `contact`
(
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `first_name`    VARCHAR(255) NOT NULL,
    `last_name`     VARCHAR(255) NOT NULL,
    `email`         VARCHAR(255) NOT NULL,
    `phone`         VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) COLLATE='utf8_polish_ci'
;