-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 06:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `rec_id` int(11) NOT NULL,
  `rec_name` varchar(50) NOT NULL,
  `rec_country` varchar(50) NOT NULL,
  `rec_difficulty` varchar(50) NOT NULL,
  `rec_prep_time` varchar(50) NOT NULL,
  `rec_added_by` varchar(50) NOT NULL,
  `rec_added_date` datetime DEFAULT current_timestamp(),
  `rec_desc` mediumtext NOT NULL,
  `rec_ing` mediumtext NOT NULL,
  `rec_prep` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`rec_id`, `rec_name`, `rec_country`, `rec_difficulty`, `rec_prep_time`, `rec_added_by`, `rec_added_date`, `rec_desc`, `rec_ing`, `rec_prep`) VALUES
(1, 'Madras Lamb Curry', 'India', 'Medium', '150', '', '0000-00-00 00:00:00', 'A comforting curry that has the perfect blend of whole spice which is first dry roasted and marinated with the lamb pieces along with yogurt to keep the meat tender', '1. cumin seeds 1 table spoon 2. poppy seeds 1 table spoon 3. peppercorns 6 nos 4. cloves 6 nos 5. cinnamon 3 pieces \r\n6. bay leaf 1 nos 7. fennel seeds 1 table spoon 8. coriander powder 2 table spoon 9. red chilli powder 1 table spoon 10. fresh coconut 0.5 nos 11. garlic paste 2 table spoon 12. ginger paste 1 table spoon 13. vegetable oil 4 table spoon 14. onions 2 nos \r\n15. lamb 1 kg 16. tomatoes 3 nos 17. coconut milk 1 cup 18. salt 2 table spoon', ' 1. Heat a griddle or flat pan on medium heat. Add the whole spices (cumin, poppy and fennel seeds, bay leaf, cinnamon, cloves, peppercorns). Roast till spices get slightly darker and aromatic. 2. Remove from heat and keep aside for 10 minutes. Grind to a fine powder in a clean, dry coffee grinder\r\n 3. Put the coconut slivers, garlic and ginger pastes, cumin and red chili powders, and the above mixed spice powder into a food processor. Add 3 to 4 tablespoons of water and grind to a smooth paste. 4. Heat the cooking oil in a deep, heavy bottomed pan on medium heat. Add the onion to it when hot. Fry till almost golden. Add the above masala (spice paste) and reduce heat slightly (just below medium heat). Fry, stirring often until the oil begins to separate from the spice paste. You may need to sprinkle water occasionally to keep the masala from burning and sticking to the pan. 5. Add the meat and fry till it starts to brown. Add the chopped tomatoes, coconut milk, and 1 cup of hot water. Season with salt to taste and stir well. Cook until the meat is soft. There should be a fair amount of thick gravy at this stage. If required, add hot water to maintain the amount of gravy as you cook.  6. When the meat is done, turn off the heat and serve immediately.'),
(2, 'Chicken Cafrael', 'India', 'Medium', '35', '', '0000-00-00 00:00:00', 'A flavoursome goan roast recipe made with a marinade of corianger, spices and garlic', '1. chicken thighs 1.5 kg 2. ginger garlic paste 1.5 table spoon 3. lemon juice 1 table spoon4. salt 1 table spoon 5. yogurt 1 cup 6. coriander leaves 1 cup 7. mint leaves 0.5 cup 8. green chilies 7 nos 9. large garlic cloves 7 nos 10. ginger 1 nos 11. cloves 4 nos 12. peppercorns 8 nos 13. cinnamon 1 nos 14. cumin seeds 1 table spoon \r\n15. turmeric powder 0.5 nos 16. lime 0.5 table spoon 17. butter 2 table spoon 18. oil 1 table spoon', '1. Pat dry the chicken, make some gashes on the chicken thighs. Rub it well with lemon juice. ginger garlic paste,yogurt & salt. Set aside for 30 minutes. In the meanwhile prepare the cafreal masala.2. In a blender/grinder, add all the ingredients listed under cafreal masala and make a smooth paste using water as required. 3. Apply half of the prepared marinade to the chicken and let it marinate 2 3 hours or overnight preferably. Reserve the remaining marinade in the refrigerator.4. Before you cook the chicken, remove it out from the refrigerator and let it come to room temperature. Heat butter and oil in a pan. Once it is hot, add the chicken pieces, cook\r\n    until golden brown on both sides.5. Then add the reserved marinade along with 1/2 cup water, cook covered on medium heat for about 15 20 minutes, depending on the size of the chicken pieces. When the chicken is almost done, cook uncovered, till the gravy dries up a bit and the masala coats the chicken well.6. Once done, sprinkle lemon juice and serve hot along with some potato wedges, lime wedges, and salad.'),
(3, 'Jollof Rice', 'Nigeria', 'Easy', '15', '', '0000-00-00 00:00:00', 'Rice spiced and stewed in a flavorful tomato broth', '1. vegetable oil 3 table spoon 2. tomatoes 6 nos 3. red poblano peppers 6 nos 4. red onions 3 nos 5. hot pepper 1 nos 6. tomato paste 3 table spoon 7. curry powder 2 table spoon 8. dried thyme 1 table spoon 9. dried bay leaves 2 nos \r\n10. chicken stock 6 cup 11. unsalted butter 2 table spoon 12. long-grain rice 4 cup 13. Salt 2 table spoon', '1. In a blender, combine tomatoes, red poblano (or bell) peppers, chopped onions, and Scotch bonnets with 2 cups of stock, blend till smooth, about a minute or two. You should have roughly 6 cups of blended mix. Pour into a large pot/ pan and bring to the boil then turn down and let simmer, covered for 10 - 12 minutes2. In a large pan, heat oil and add the sliced onions. Season with a pinch of salt, stir-fry for 2 to 3 minutes, then add the bay leaves, curry powder and dried thyme and a pinch of black pepper for 3 - 4 minutes on medium heat. Then add the tomato paste - stir for another 2 minutes. Add the reduced tomato-pepper-Scotch bonnet mixture, stir, and set on medium heat for 10 to 12 minutes till reduced by half, with the lid on. This is the stew that will define the pot.\r\n3. Add 4 cups of the stock to the cooked tomato sauce and bring it to boil for 1 - 2 minutes.4. Add the rinsed rice and butter, stir, cover with a double piece of foil/baking or parchment paper and put a lid on the pan—this will seal in the steam and lock in the flavour. Turn down the heat and cook on low for 30 minutes.5. Stir rice—taste and adjust as required.6. If you like, add sliced onions, fresh tomatoes and the 2nd teaspoon of butter and stir through.7. To make Party Rice, you will need one more step. Now Party Rice is essentially Smoky Jollof Rice, traditionally cooked over an open fire. However, you can achieve the same results on the stove top. Here is how: Once the rice is cooked, turn up the heat with the lid on and leave to \"\"burn\"\" for 3 to 5 minutes. You will hear the rice crackle and snap and it will smell toasted. Turn off the heat and leave with the lid on to \"\"rest\"\" till ready to serve. The longer the lid stays on, the smokier. Let the party begin!'),
(4, 'Efo Riro', 'Nigeria', 'Easy', '30', '', '0000-00-00 00:00:00', 'Delicious Nigerian spinach stew with complex African flavors', '1. red bell peppers 3 nos 2. habanero pepper 2 nos 3. tomato 1 nos 4. yellow onion 0.5 nos 5. red bell pepper 1 nos 6. onion 0.5 nos 7. mushroom 0.25 kg 8. fresh spinach 0.25 kg 9. vegetable oil 0.25 kg 10. vegetarian bouillon 2 cubes 11. curry powder 1 table spoon', '1. Boil water for blanching spinach - this recipe uses two pots to minimize cook time, but you can do this step in the same pot if you desire. If so, just finish blanching the spinach first, and then clean the pot before adding oil. See notes in post for blanching spinach (or skip ahead a couple of steps) 2. Add oil to a deep pot and heat it on medium flame 3. In the meantime, blend the red bell peppers, habanero peppers, tomato and onion to form a coarse puree (see notes) and set aside 4. Once the oil gets hot, add the onion and red pepper, and fry until translucent (about 30 seconds) 5. Then, add the puree and fry until the raw smell disappears (about 4 to 5 minutes) 6. While the puree is frying, blanch the spinach - as soon as the water reaches a rolling boil, dunk the spinach in the water for 30 seconds, remove from the pot, and wash under cold water - set aside 7. Add the bouillon, curry powder, and umami seasoning of choice (optional) and fry for 1 minute 8. Now add the mushrooms and let it come to a soft simmer (you will notice bubbles appearing) 9. When bubbles appear, add spinach, stir it in well and let it cook uncovered for about 2-3 minutes 10. Serve hot with rice (or other traditional \"\"swallows\"\" like pounded yam or cassava)'),
(10, 'new recipe', 'new country', 'new difficulty', '90', 'new person', '2022-03-16 20:56:14', 'abc', 'def', 'ghi'),
(11, 'new recipe', 'new country', 'new difficulty', '90', 'new person', '2022-03-17 15:04:04', 'aaa', 'aaaa', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `acc_start_date` datetime DEFAULT current_timestamp(),
  `freecode1` varchar(50) NOT NULL,
  `freecode2` varchar(50) NOT NULL,
  `freecode3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `phone`, `is_admin`, `acc_start_date`, `freecode1`, `freecode2`, `freecode3`) VALUES
(1, 'Oluwaseyi', 'Aborisade', 'seyi', 'o.aborisade@rgu.ac.uk', 'pass@123', 10001, 0, '0000-00-00 00:00:00', '', '', ''),
(2, 'Olayinka', 'Banjoko', 'olayinka', 'o.banjoko1@rgu.ac.uk', 'pass@123', 10002, 0, '0000-00-00 00:00:00', '', '', ''),
(3, 'Osazenaye', 'Efosa-Agho', 'naye', 'o.efosa-agho@rgu.ac.uk', 'pass@123', 10003, 0, '0000-00-00 00:00:00', '', '', ''),
(4, 'Valency', 'Goncalves', 'valency', 'v.goncalves@rgu.ac.uk', 'pass@123', 10004, 0, '0000-00-00 00:00:00', '', '', ''),
(5, 'Light', 'Nwokocha', 'light', 'l.nwokocha@rgu.ac.uk', 'pass@123', 10005, 0, '0000-00-00 00:00:00', '', '', ''),
(6, 'Nneka', 'Okeke', 'nneka', 'n.okeke@rgu.ac.uk', 'pass@123', 10006, 0, '0000-00-00 00:00:00', '', '', ''),
(7, 'Rohan', 'Sasidharan Nair', 'rohan', 'r.sasidharan-nair@rgu.ac.uk', 'pass@123', 10007, 1, '0000-00-00 00:00:00', '', '', ''),
(25, 'dummy', 'user', 'dummyuser', 'dummy@user.com', '$2y$10$HyqczegtPLlhqcXqX75nGO2fvYnCUY6qjlRjOHi1sVb', 1234567890, 0, '2022-03-14 11:42:07', '', '', ''),
(26, 'test', 'testing', 'tester', 'test@test.com', '$2y$10$IARw5vNRmdEvlyQYdpvMZ./chl3/uRlT2Chp/mP8w/7', 1234567890, 0, '2022-03-14 12:16:22', '', '', ''),
(27, 'test', 'test', 'tester1', 'test@test.com', '$2y$10$zgbmXU7m1y0hTPCa1SkZjeF3K9m9xkF8497c7XQ1MSf', 123456789, 0, '2022-03-15 12:36:44', '', '', ''),
(28, 'user', 'lastname', 'username', 'user@user.com', '$2y$10$Kd7WZp.GK5ErgqPCi6q02emWeSMfb/r8dytxYgyPm50', 123456789, 0, '2022-03-17 15:02:51', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
