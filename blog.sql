-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 04:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Science &amp; technology ', 'Science and technology form an inseparable duo that shapes our modern world. Science fuels our understanding of the universe, unraveling its mysteries through systematic inquiry. Technology harnesses this knowledge to innovate and enhance our lives. From smartphones to medical breakthroughs, their collaboration powers progress. Yet, ethical considerations must accompany advancement, ensuring responsible development. In this era of rapid change, fostering a symbiotic relationship between science and technology is essential for a sustainable and prosperous future.                 '),
(2, 'Food', 'Food, not just sustenance but a cultural orchestra of flavors. From spicy curries to delicate pastries, it reflects creativity and tradition. Beyond nutrition, it binds us through memories of family gatherings, sizzling grills, and comforting bowls. Food unites, delights, and speaks a universal language of taste and togetherness.                '),
(4, 'Art', 'Art, the soul&#039;s language on canvas, in stone, or through movement. It transcends time, capturing emotions and ideas. With each stroke of a brush or chisel&#039;s touch, artists unveil visions that provoke thought and touch hearts. Whether vibrant or subtle, art&#039;s hues mirror the complexity of human experience. It bridges cultures, sparking conversations beyond words. From ancient cave drawings to modern installations, art weaves stories, fostering a profound connection between creator and beholder.                        '),
(5, 'Travel', 'Travel, a gateway to exploration and enlightenment, broadens horizons and enriches perspectives. Venturing beyond familiar confines exposes us to diverse cultures, landscapes, and traditions. The thrill of discovery and the bonds forged with fellow travelers create lasting memories. However, responsible travel is imperative, as it impacts environments and communities. By immersing ourselves in new experiences while respecting local customs and minimizing our ecological footprint, we can savor the beauty of our world and promote global understanding.'),
(7, 'Music', 'Music, a universal language that transcends boundaries, resonates deep within the human soul. Its melodies evoke emotions, from joy to introspection, shaping memories and cultures. Instruments and voices blend in harmonious symphonies, conveying messages beyond words. Music&#039;s power to heal and inspire is undeniable, fostering connections among people. Whether classical or contemporary, it accompanies life&#039;s journey, igniting passion and offering solace. Through its enchanting notes, music remains an indispensable and cherished aspect of human existence.'),
(8, 'Uncategorized', 'This is the default category'),
(10, 'Wild Life', 'Wildlife, a captivating tapestry of nature&#039;s diversity, encompasses all living organisms that inhabit our planet without direct human intervention. It is a testament to the intricate web of life on Earth, where each species plays a unique role in the ecosystem.\r\n\r\nIn the realm of wildlife, you can find an astonishing array of creatures, from the majestic and powerful to the small and elusive. Iconic species like lions, elephants, and eagles command attention with their beauty and strength, while the tiny insects, frogs, and songbirds captivate with their intricate patterns and melodies.\r\n\r\nWildlife is not limited to land; it thrives in the oceans, rivers, and skies. The coral reefs teem with vibrant fish and intricate marine life, while whales and dolphins navigate the deep waters. In the air, birds of prey soar gracefully, and migratory birds travel vast distances, connecting distant ecosystems.\r\n\r\nBeyond their visual splendor, wildlife plays a crucial role in maintaining the balance of ecosystems. Predators help control prey populations, herbivores shape vegetation, and decomposers recycle nutrients. Each species, no matter how small or inconspicuous, contributes to the intricate dance of life on Earth.\r\n\r\nYet, wildlife faces numerous challenges, including habitat loss, pollution, climate change, and poaching. Conservation efforts are vital to protect these remarkable creatures and their habitats, preserving biodiversity for future generations.\r\n\r\nIn the presence of wildlife, one can experience a profound connection with the natural world. Observing animals in their natural habitat, whether in a dense rainforest, vast savannah, or remote wilderness, fosters a sense of wonder, reverence, and responsibility. Wildlife reminds us of the intricate and fragile beauty of our planet and the importance of preserving it for generations to come.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(19, 'Pioneering Cosmic Frontiers', 'Rockets, feats of engineering, breach Earth&#039;s confines, propelling humanity into the cosmos. Evolved from ancient principles, they now launch satellites, probes, and astronauts. Fueled by controlled combustion, rockets conquer gravity&#039;s grip. They&#039;ve enabled lunar landings, interplanetary exploration, and glimpses into the universe&#039;s origin. Rockets stand as conduits of human curiosity and aspiration, connecting us with the infinite expanse, forever expanding our understanding and horizons.', '1694165015blog2.jpg', '2023-08-23 08:18:48', 1, 15, 0),
(20, 'Journeys of Discovery', 'Travel, a passport to experience, opens doors to new cultures, landscapes, and perspectives. It fosters empathy, breaking down barriers of ignorance. Exploring distant lands, tasting diverse cuisines, and conversing with strangers broaden horizons. Through travel, we embrace the world&#039;s richness, realizing our shared humanity. Whether wandering ancient cities or trekking wild landscapes, each adventure becomes a chapter in a global story of exploration and self-discovery.', '1692778811blog35.jpg', '2023-08-23 08:20:11', 5, 15, 0),
(21, 'Rhythmic Heartbeat', 'Drums, primal instruments, echo the pulse of humanity. Through their beats, they convey emotions, celebrations, and rituals. From tribal gatherings to modern stages, they unite communities. The drum&#039;s resonance resonates in our souls, transcending language. Its dynamic rhythms drive melodies and enliven music. With each strike, the drum forms a bridge between ancient traditions and contemporary melodies, reminding us of music&#039;s innate power to connect and inspire.', '1694167102blog49.jpg', '2023-08-23 12:00:52', 7, 22, 0),
(22, 'Expressions Beyond Words', 'Art, a universal language, unveils human creativity and emotions. Through paint, sculpture, and more, artists communicate their inner worlds. It captures moments, critiques society, and stirs emotions. From Renaissance masterpieces to contemporary installations, art evolves with cultures. It fosters dialogue and introspection, bridging gaps between diverse perspectives. In galleries and streets, it&#039;s a mirror reflecting the human experience, reminding us of the beauty in imagination.', '1692793169blog1.jpg', '2023-08-23 12:19:29', 4, 23, 0),
(23, 'A Tapestry of Human Creativity and Expression', 'Art, in its myriad forms, is a testament to the boundless creativity and depth of human expression. From the earliest cave paintings to the most contemporary installations, art serves as a reflection of society, culture, and the individual artist&#039;s inner world.\r\n\r\nThroughout history, artists have captured the essence of their times, offering insights into social norms, political upheavals, and cultural shifts. Masterpieces like Leonardo da Vinci&#039;s &quot;Mona Lisa&quot; and Vincent van Gogh&#039;s &quot;Starry Night&quot; transcend time, conveying emotions and stories that resonate across generations. But art is not confined to grand galleries; it thrives in street murals, folk traditions, and digital creations, proving its adaptability to changing mediums and contexts.\r\n\r\nArt is more than aesthetics; it&#039;s a powerful vehicle for provoking thought and sparking dialogue. It challenges perceptions, often defying conventional boundaries and norms. Abstract art, for example, encourages viewers to interpret and find personal meaning. Performance art blurs the line between artist and audience, engaging them in a shared experience.\r\n\r\nCreating art is an act of vulnerability. Artists pour their souls into their work, revealing their unique perspectives and emotions. This vulnerability invites viewers to connect on a profound level, fostering empathy and understanding. Art moves beyond words, conveying what language struggles to express.\r\n\r\nIn a world flooded with information, art provides a sanctuary for contemplation. Museums and galleries become spaces for reflection, where diverse minds converge to explore a common human experience. Art&#039;s ability to evoke emotions and inspire introspection cements its role as a timeless channel for communication and an everlasting source of inspiration.', '1692857635blog68.jpg', '2023-08-24 06:13:55', 4, 22, 0),
(24, 'Sustenance and Delight', 'Food, a universal necessity, is a source of sustenance and pleasure. Beyond nourishing our bodies, it embodies cultural heritage and personal memories. The diversity of flavors, ingredients, and preparation methods reflects the richness of our world. From street vendors&#039; delicacies to haute cuisine, food transcends borders, uniting us through shared experiences. Meals bring people together, fostering connections and conversations. With each bite, we embark on a journey that awakens our senses and connects us to the past, present, and the global tapestry of culinary traditions.', '1692858000blog25.jpg', '2023-08-24 06:20:00', 2, 22, 0),
(25, 'Nature&#039;s Intricate Web', 'Wildlife: Nature&#039;s Intricate Web\r\n\r\nWildlife, comprising diverse species in their natural habitats, forms an intricate web of life on our planet. From majestic elephants to elusive insects, each organism plays a vital role in maintaining ecological balance. Forests, oceans, and grasslands are their homes, providing sustenance and shelter.\r\n\r\nThe beauty of wildlife lies in its diversity&mdash;every creature is a result of millions of years of evolution. Beyond their intrinsic value, animals contribute to ecosystem services such as pollination, pest control, and nutrient cycling, which benefit both nature and humanity.\r\n\r\nHowever, human activities like habitat destruction, pollution, and poaching endanger these delicate ecosystems. Conservation efforts are crucial to preserving the tapestry of life. National parks, wildlife reserves, and educational initiatives help safeguard species for future generations.\r\n\r\nWildlife also captivates human imagination, inspiring art, literature, and scientific discovery. Documentaries and wildlife photography grant us glimpses into their world, fostering empathy and awareness.\r\n\r\nIn protecting wildlife, we safeguard the Earth&#039;s health and our own well-being. The survival of each species is intertwined, a reminder that we share this planet with countless remarkable creatures.', '1692873330blog3.jpg', '2023-08-24 10:35:30', 8, 22, 0),
(31, 'The Journey of Discovery', 'Travel is a transformative journey that transcends geographical boundaries and enriches the soul. It&#039;s an exploration of the world and oneself. Stepping beyond the familiar, we encounter diverse cultures, landscapes, and perspectives. These experiences challenge preconceptions and expand horizons, fostering empathy and understanding.\r\n\r\nThrough travel, history comes alive amidst ancient ruins, and nature&#039;s grandeur humbles us in awe-inspiring vistas. Local cuisines tantalize the palate, and conversations with strangers become windows into new worlds.\r\n\r\nTravel is not just about reaching destinations; it&#039;s about embracing the unexpected, from the hidden gems of a bustling city to the serenity of remote landscapes. Each journey is a chapter in the book of life, leaving indelible memories and lessons. It&#039;s a reminder that the world is vast and beautiful, waiting to be explored and cherished.', '1694436860blog22.jpg', '2023-09-01 18:21:17', 5, 22, 0),
(32, 'The Transformative Power of Travel', 'Traveling has been a fundamental aspect of human existence for centuries, offering individuals an opportunity to explore new horizons, cultures, and experiences. It is a journey of both physical movement and personal growth. The act of travel can be a source of education, relaxation, adventure, and self-discovery. In this essay, we will delve into the profound impact of travel on individuals and society as a whole.\r\n\r\nFirstly, travel broadens one&#039;s horizons by exposing them to different cultures, traditions, and perspectives. When we step out of our familiar surroundings and venture into new territories, we open ourselves up to diverse ways of life. Meeting people from various backgrounds and learning about their customs helps break down stereotypes and fosters a greater sense of empathy and understanding. This cultural exchange enriches our lives, making us more accepting and open-minded individuals.\r\n\r\nSecondly, travel is an excellent educational tool. It provides an experiential learning opportunity that goes beyond what any classroom can offer. Historical landmarks, museums, and natural wonders become interactive textbooks, allowing travelers to immerse themselves in history, art, and science. Whether it&#039;s visiting the pyramids of Egypt, the Louvre in Paris, or the Great Wall of China, travel enables us to connect with the world&#039;s heritage and gain a deeper appreciation for human achievements.\r\n\r\nFurthermore, travel offers a break from the monotony of daily life. It provides an escape from the stresses and routines of work and responsibilities. Stepping into a new environment can rejuvenate the mind and body. The change of scenery, the thrill of exploration, and the relaxation of a vacation can reduce stress and improve overall well-being. Travel serves as a reset button for our lives, allowing us to return home with renewed energy and perspective.\r\n\r\nMoreover, travel fosters personal growth and self-discovery. It pushes individuals out of their comfort zones, forcing them to adapt to new situations and challenges. Whether it&#039;s navigating a foreign city or trying exotic foods, these experiences build resilience and self-confidence. Travelers often discover hidden talents, develop problem-solving skills, and gain a deeper understanding of themselves along the way.\r\n\r\nTravel also has a significant economic impact on both local and global scales. The tourism industry creates jobs, supports local businesses, and contributes to the economic development of many regions. It encourages cultural preservation and environmental conservation by highlighting the value of natural and cultural assets.\r\n\r\nIn conclusion, travel is more than just a leisure activity; it is a transformative journey that shapes individuals and societies alike. Through cultural exchange, education, relaxation, and personal growth, travel enriches our lives and broadens our perspectives. It is a powerful force that not only connects us with the world but also with ourselves. In a rapidly changing world, the importance of travel as a means of exploration, education, and self-discovery cannot be underestimated.', '1694166253blog7.jpg', '2023-09-08 09:44:13', 5, 15, 0),
(33, ' The Profound Expression of Human Creativity', 'Art, a profound expression of human creativity, transcends boundaries and speaks to the soul. It encompasses various forms, from painting and sculpture to music and dance. Through art, individuals convey their emotions, beliefs, and experiences, inviting others to interpret and connect with their unique perspectives. Art has the power to inspire, provoke thought, and evoke profound emotions. It is a timeless medium that reflects the beauty, complexity, and diversity of the human experience, serving as a universal language that unites people across cultures and generations.', '1694166431blog14.jpg', '2023-09-08 09:47:11', 4, 15, 0),
(34, 'Cake', 'Cake, a delightful creation that has graced celebrations and sweetened everyday moments for generations, holds a special place in our hearts and taste buds. Comprising simple ingredients like flour, sugar, eggs, and butter, it undergoes a magical transformation in the oven, rising into a soft, moist, and delectable treat. Cake comes in a myriad of flavors and forms, from classic chocolate and vanilla to exotic fruit and gourmet varieties. It serves as a symbol of joy, marking birthdays, weddings, and milestones. Beyond celebrations, cake brings comfort, offering solace in times of need. Its sweet allure is a universal language of happiness, shared and savored by people of all ages, cultures, and backgrounds.', '1694166623blog101.jpg', '2023-09-08 09:50:23', 2, 25, 0),
(35, 'Fruits', 'Fruits, nature&#039;s exquisite bounty, offer a tantalizing fusion of flavor, nutrition, and vibrant colors. These treasures of the earth provide a diverse spectrum of taste experiences, from the tangy burst of citrus to the sweetness of a ripe mango. Beyond their deliciousness, fruits are nutritional powerhouses, packed with vitamins, fiber, and antioxidants that promote health and well-being. They invigorate our senses and nourish our bodies, contributing to a balanced diet. Fruits, whether eaten fresh, juiced, or blended into smoothies, are a delicious way to stay hydrated and energized. They remind us of the beauty and generosity of the natural world, a gift to savor and celebrate.', '1694166715blog34.jpg', '2023-09-08 09:51:55', 2, 25, 1),
(36, 'A Universal Language That Transcends Boundaries and Unites Hearts', 'Music, a universal language that transcends boundaries and unites hearts, has been an integral part of human culture for millennia. It holds the power to evoke emotions, tell stories, and convey the deepest of human experiences.\r\n\r\nOne of the most remarkable aspects of music is its ability to communicate across cultures and generations. Regardless of language barriers, a melody can stir emotions, and rhythm can inspire movement. Music bridges divides, fostering connections between people who may otherwise have nothing in common.\r\n\r\nBeyond its capacity to unite, music is a source of profound emotional expression. It can capture the joy of celebration, the sorrow of loss, the excitement of adventure, and the contemplation of solitude. From the soothing notes of a lullaby to the energetic beats of rock &#039;n&#039; roll, music accompanies us through life&#039;s ups and downs, providing solace, motivation, and a soundtrack to our memories.\r\n\r\nMoreover, music is a vital form of art and self-expression. Musicians pour their creativity and passion into composing, performing, and interpreting melodies. Whether it&#039;s a virtuoso pianist playing a classical concerto or a poet delivering heartfelt lyrics, artists convey their thoughts and emotions through their craft.\r\n\r\nMusic is also an influential force in society. It has the power to shape culture, inspire movements, and challenge the status quo. From protest songs that advocate for change to anthems that celebrate unity, music amplifies voices and drives social transformation.\r\n\r\nIn conclusion, music is more than just organized sound; it is the heartbeat of human existence. It connects, communicates, and inspires on levels that words alone cannot reach. Through its universality, emotional depth, artistic expression, and societal influence, music enriches our lives and enriches the world around us, making it an indispensable part of our shared human experience.', '1694166950blog38.jpg', '2023-09-08 09:55:50', 7, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `avatar`, `is_admin`) VALUES
(1, 'Brabyns', 'Yabwetsa', 'brabyyabz@gmail.com', 'Musa', '$2y$10$XzDOISvh2HC7CEbJxmalROEwECwvBXZm6ptEAN4xFoUOGwclOAIKK', '1692331226avatar8.jpg', '1'),
(15, 'Bonzela', 'Okinda', 'bonzela@gmail.com', 'Bonzela', '$2y$10$7nIsJli8dCYsByK4HrKqJudPVv/QVvd5CCUd2mwapY/azFMCRqiCW', '1692512310avatar3.jpg', '1'),
(22, 'Brabyns', 'Yabwetsa', 'burabuyabz@gmail.com', 'Brabyns', '$2y$10$r6HltSpmtGH10fI1jNgWjuiW4BYbQ0LWRK13EK2lToJ0FTVkLX6cC', '1692791778avatarBrabyns.jpg', '1'),
(23, 'Edmond', 'Bukhebi', 'bukhebiedmond@gmail.com', 'Edmond', '$2y$10$Fgy0hkhlr/9ZmYKXxhTg1eCmKXq4AWKdzl4AiQ7iG9eoFL/o18Gm2', '1692793049WhatsApp Image 2023-08-23 at 15.13.35.jpg', '0'),
(25, 'Graffins', 'Kihima', 'Grafo@gmail.com', 'Grafo', '$2y$10$k0poT/eKfeNKuSTdKDO33eBZYOyAGywAlKnW2jTxklotIwgbhadtq', '1694166539avatar11.jpg', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
