
	
	ALTER TABLE `nuorodos` CHANGE `id` `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT;
	
	ALTER TABLE `nuorodos_kategorijos` ADD FOREIGN KEY (`id_kategorijos`) REFERENCES `kategorijos`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
	
	ALTER TABLE `nuorodos_kategorijos` ADD FOREIGN KEY (`id_nuorodos`) REFERENCES `nuorodos`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
	
	-- buvo uždeti unikalūs indeksai `nuorodos`.`nuoroda` ir `kategorijos`.`pav` ir  nenusiima ..