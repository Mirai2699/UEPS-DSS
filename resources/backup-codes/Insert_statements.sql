-- NOTE: DISABLE THE "FOREIGN KEY CHECKS TO AVOID ERRORs IN IMPORTING DATA"

TRUNCATE TABLE `r_barangay_details`;
TRUNCATE TABLE `r_barangay_population`;
TRUNCATE TABLE `r_land_use`;
TRUNCATE TABLE `r_infrastructures`;
TRUNCATE TABLE `r_terrain_hazard`;



	-- For Barangay Details Reference

	INSERT INTO `r_barangay_details` (`brgy_det_ID`, `brgy_det_captain`, `brgy_det_refID`, `brgy_det_status`, `brgy_timestamp`) VALUES
	(1, 'Ariel R. Macalindong', 1, 'Active', '2019-03-12 05:13:27'),
	(2, 'Ruperto C. Alhambra', 2, 'Active', '2019-03-12 04:47:49'),
	(3, 'Rosalina A. De Villa', 3, 'Active', '2019-03-12 04:48:55'),
	(4, 'Medina M. Medina', 14, 'Active', '2019-03-12 06:55:17'),
	(5, 'Hermino D. SobrepeÃ±a', 4, 'Active', '2019-03-12 06:59:06'),
	(6, 'Dionisio V. Erilla', 5, 'Active', '2019-03-14 21:40:07'),
	(7, 'Francisco P. Suarez', 6, 'Active', '2019-03-14 21:41:04'),
	(8, 'Edralin Magno E. Camilon', 7, 'Active', '2019-03-14 21:41:35'),
	(9, 'Randoll I. Catapang', 8, 'Active', '2019-03-14 21:42:32'),
	(10, 'Modesto P. Barangas', 9, 'Active', '2019-03-14 21:43:02'),
	(11, 'Susano C. Abellera', 10, 'Active', '2019-03-14 21:43:41'),
	(12, 'Jaime R. Rodriguez', 13, 'Active', '2019-03-14 21:44:13'),
	(13, 'Adrian C. Perez', 22, 'Active', '2019-03-14 21:44:59'),
	(14, 'Maximo M. Creus', 21, 'Active', '2019-03-14 21:45:25'),
	(15, 'Eduardo D. Roxas', 11, 'Active', '2019-03-14 21:46:02'),
	(16, 'Pedro P. Sanchez', 12, 'Active', '2019-03-14 21:46:32'),
	(17, 'Jovencio T. Quinag', 17, 'Active', '2019-03-14 21:47:09'),
	(18, 'Vicente B. Bagui', 16, 'Active', '2019-03-14 21:47:36'),
	(19, 'Ramil C. Sanchez', 15, 'Active', '2019-03-14 21:48:11'),
	(20, 'Gaudencio B. Varias', 18, 'Active', '2019-03-14 21:48:49'),
	(21, 'Roberto A. Mendoza', 19, 'Active', '2019-03-14 21:49:35'),
	(22, 'Simeona M. Cornejo', 20, 'Active', '2019-03-14 21:51:00');

	-- --------------------------------------------------------

	-- For Barangay Population Reference

	INSERT INTO `r_barangay_population` (`brgy_pop_ID`, `brgy_pop_count`, `brgy_pop_year`, `brgy_pop_per_annum`, `brgy_pop_refID`, `brgy_pop_status`, `brgy_pop_timestamp`) VALUES
	(1, 1131, 2015, '2.6%', 1, 'Active', '2019-03-12 05:13:27'),
	(2, 2047, 2015, '4.7%', 2, 'Active', '2019-03-12 04:47:49'),
	(3, 2595, 2015, '5.9%', 3, 'Active', '2019-03-12 04:48:55'),
	(4, 598, 2015, '1.4%', 14, 'Active', '2019-03-12 06:55:17'),
	(5, 1227, 2015, '2.8%', 4, 'Active', '2019-03-12 06:59:06'),
	(6, 1601, 2015, '3.66%', 5, 'Active', '2019-03-14 21:40:07'),
	(7, 2305, 2015, '5.27%', 6, 'Active', '2019-03-14 21:41:04'),
	(8, 1613, 2015, '3.69', 7, 'Active', '2019-03-14 21:41:35'),
	(9, 3066, 2015, '7.01%', 8, 'Active', '2019-03-14 21:42:32'),
	(10, 3351, 2015, '7.66%', 9, 'Active', '2019-03-14 21:43:02'),
	(11, 1345, 2015, '3.07%', 10, 'Active', '2019-03-14 21:43:41'),
	(12, 2358, 2015, '5.39%', 13, 'Active', '2019-03-14 21:44:13'),
	(13, 1501, 2015, '3.43%', 22, 'Active', '2019-03-14 21:44:59'),
	(14, 2510, 2015, '5.47%', 21, 'Active', '2019-03-14 21:45:25'),
	(15, 2233, 2015, '5.10%', 11, 'Active', '2019-03-14 21:46:02'),
	(16, 1730, 2015, '3.95%', 12, 'Active', '2019-03-14 21:46:32'),
	(17, 2949, 2015, '6.74%', 17, 'Active', '2019-03-14 21:47:09'),
	(18, 2085, 2015, '4.77%', 16, 'Active', '2019-03-14 21:47:36'),
	(19, 1091, 2015, '2.49%', 15, 'Active', '2019-03-14 21:48:11'),
	(20, 3292, 2015, '7.53%', 18, 'Active', '2019-03-14 21:48:49'),
	(21, 1870, 2015, '4.27%', 19, 'Active', '2019-03-14 21:49:35'),
	(22, 1245, 2015, '2.85%', 20, 'Active', '2019-03-14 21:51:00');


	-- For Land Use Reference

	INSERT INTO `r_land_use` (`lu_ID`, `lu_desc`, `lu_active_status`, `lu_add_timestamp`, `lu_mod_timestamp`) VALUES
	(1, 'Commercial', 'Active', '2019-02-23 06:35:05', '2019-02-23 06:35:05'),
	(2, 'Residential', 'Active', '2019-02-23 06:48:51', '2019-02-23 06:48:51'),
	(3, 'Industrial', 'Active', '2019-03-12 14:01:41', '2019-03-12 14:01:41'),
	(4, 'Institutional', 'Active', '2019-03-12 14:02:59', '2019-03-12 14:02:59'),
	(5, 'Agricultural', 'Active', '2019-03-12 14:03:14', '2019-03-12 14:03:14');


	-- For Infrastructure Reference

	INSERT INTO `r_infrastructures` (`inf_id`, `inf_name`, `inf_desc`, `created_at`, `updated_at`) VALUES
	(1, 'Economic infrastructure', 'basic services that represent a foundational tool for the economy of a nation, region or city. Infrastructure can include physical structures, systems, institutions, services and facilities.', '2019-03-11 02:14:08', NULL),
	(2, 'Transportation', 'Transportation services such as roads, bridges, cycle highways, rail, airports and ports.', '2019-03-11 02:14:28', NULL),
	(3, 'Energy', 'Production and delivery of energy including electric grids. Most nations are moving towards sustainable energy sources such as solar panels and wind.', '2019-03-11 02:14:42', NULL),
	(4, 'Water', 'Water infrastructure that provides a supply of clean water and management of water resources.', '2019-03-11 02:14:51', NULL),
	(5, 'Safety & Resilience', 'Institutions and systems that allow a region to endure stresses such as a natural disaster. For example, earthquake detection systems, tsunami shelters and a resilient source of local food.', '2019-03-11 02:15:17', NULL),
	(6, 'Financial', 'Financial markets and services that support basic economic processes such as raising capital, investing, storing wealth, payments and managing risk.', '2019-03-11 02:15:37', NULL),
	(7, 'Health & Education', 'Institutions that provide for basic quality of life such as hospitals and schools.', '2019-03-11 02:15:49', NULL),
	(8, 'Standards & Rules', 'Institutions that provide basic rules and standards that result in productive competition, stewardship of common resources and protection of quality of life.', '2019-03-11 02:15:57', NULL),
	(9, 'Public Space', 'Public space that attracts economic activity such as tourism and corporate offices including parks, beaches and nature reserves.', '2019-03-11 02:16:19', NULL),
	(10, 'Culture', 'Cultural institutions such as museums that attract tourists and companies to a region.', '2019-03-11 02:16:31', NULL),
	(11, 'Technology', 'Basic technology services such as networks.', '2019-03-11 02:16:40', NULL),
	(12, 'Environment', 'Systems that improve environmental conditions such as rain gardens and green roofs.', '2019-03-11 02:16:54', NULL),
	(13, 'Treatment Facilities', 'facilities that gives treatment to contaminated natural resources', '2019-03-14 14:28:00', NULL);


	-- For Hazard Reference

	INSERT INTO `r_terrain_hazard` (`haz_ID`, `haz_desc`, `haz_stat`, `haz_timestamp`) VALUES
	(1, 'None', 'Active', '2019-03-14 05:57:00'),
	(2, 'Chemical Factory', 'Active', '2019-03-14 05:57:00'),
	(3, 'Slopes', 'Active', '2019-03-14 00:00:00'),
	(4, 'River', 'Active', '2019-03-14 00:00:00'),
	(5, 'Creek', 'Active', '2019-03-14 00:00:00'),
	(6, 'Forest', 'Active', '2019-03-14 00:00:00');
