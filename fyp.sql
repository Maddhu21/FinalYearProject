-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 10:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `path` text NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `path`, `prod_id`) VALUES
(1, 'images/Versace_Jeans_Couture_Clown_Trouser.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_cat` varchar(32) NOT NULL,
  `prod_gen` varchar(16) NOT NULL,
  `prod_col` varchar(24) NOT NULL,
  `prod_size` varchar(8) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_cat`, `prod_gen`, `prod_col`, `prod_size`, `prod_price`, `prod_desc`) VALUES
(1, 'Versace Jeans Couture Clown Trouser', 'Jeans', 'Women', 'Green', 'M', 129.99, 'Embrace a playful yet sophisticated look with our Versace Jeans Couture Clown Trouser. Designed to captivate, the lively green color adds a pop of vibrancy to your outfit. The tailored fit effortlessly flatters your figure, while the medium size ensures a comfortable and versatile fit. Elevate your style with a touch of luxury and artistry that only Versace can deliver.'),
(2, 'Diesel Men\'s Buster Tapered Jeans', 'Jeans', 'Men', 'Black', 'M', 89.95, 'Make a bold statement with our Diesel Men\'s Buster Tapered Jeans. The deep black hue exudes timeless coolness, and the tapered fit provides a modern edge. Crafted for comfort and style, these jeans are a versatile addition to your wardrobe. Embrace a contemporary look that seamlessly transitions from casual outings to urban adventures.'),
(3, 'Balmain Geometric Print Skinny Jeans', 'Jeans', 'Women', 'White', 'M', 179.00, 'Unleash your inner fashionista with our Balmain Geometric Print Skinny Jeans. The intricate white geometric pattern adds a touch of avant-garde to your ensemble. Crafted to perfection, these jeans blend comfort with high-fashion appeal. Elevate your style game and embrace the unique beauty of Balmain\'s design.'),
(4, 'Gucci stonewashed classic Jeans', 'Jeans', 'Men', 'Black', 'M', 249.99, 'Elevate your denim collection with our Gucci Stonewashed Classic Jeans. The stonewashed black finish exudes sophistication, and the classic design pays homage to timeless fashion. Experience luxury and comfort with each wear, as you confidently embrace the elegance that Gucci represents.'),
(5, 'Dark Denim Victoria Silk Touch Jeans', 'Jeans', 'Men', 'Black', 'M', 139.95, 'Step into refined style with our Dark Denim Victoria Silk Touch Jeans. The deep black hue exudes confidence, while the silk-like touch adds a luxurious element to your outfit. Crafted for comfort and class, these jeans are a true testament to modern sophistication'),
(6, 'Indigo Sadie Slim Leg Jeans', 'Jeans', 'Men', 'Navy', 'M', 99.99, 'Make a suave statement with our Indigo Sadie Slim Leg Jeans. The rich navy hue exudes confidence and versatility. The slim leg design offers a contemporary touch, making these jeans perfect for both casual and semi-formal occasions. Embrace a tailored look that effortlessly captures your unique style.'),
(7, 'Amapo skinny jeans', 'Jeans', 'Men', 'Light Blue', 'M', 69.95, 'Embrace a fresh and casual vibe with our Amapo Skinny Jeans in light blue. The soft hue adds a touch of relaxation, while the skinny fit complements your figure. Crafted for comfort and style, these jeans are a go-to choice for effortlessly cool looks.'),
(8, 'Marc Jacobs Stick Fit Jeans', 'Jeans', 'Men', 'Dark Blue', 'M', 119.00, 'Elevate your denim game with our Marc Jacobs Stick Fit Jeans. The dark blue wash exudes a timeless elegance, and the stick fit design offers a contemporary edge. Crafted with attention to detail, these jeans are a testament to refined style and quality.'),
(9, 'Amapo Skinny Woman Jeans', 'Jeans', 'Women', 'Navy', 'M', 79.95, 'Embrace sleek and versatile fashion with our Amapo Skinny Woman Jeans. The navy color adds depth to your outfit, and the skinny fit flatters your figure. Step into a world of comfort and style that effortlessly captures your unique personality.'),
(10, 'Vero Moda Brenda Jeans', 'Jeans', 'Women', 'Dark Brown', 'M', 89.00, 'Embrace the allure of deep hues with our Vero Moda Brenda Jeans in dark brown. The color adds sophistication, while the tailored fit offers comfort and style. Elevate your fashion game with a touch of elegance that\'s perfect for any occasion.'),
(11, 'Vero Moda Lux Jeans', 'Jeans', 'Women', 'Navy', 'M', 99.00, 'Experience luxury and style with our Vero Moda Lux Jeans in navy. The rich color and tailored fit create a look that\'s both comfortable and elegant. Embrace versatile fashion that effortlessly transitions from day to night.'),
(12, 'Woman Noisy May Allie Skinny Fit Low Waist Jeans', 'Jeans', 'Women', 'Light Blue', 'M', 59.99, 'Embrace a contemporary look with our Noisy May Allie Skinny Fit Low Waist Jeans. The light blue hue adds a touch of freshness, and the low waist design offers a modern twist. Crafted for comfort and style, these jeans are a must-have for fashion-forward individuals.'),
(13, 'Womens Jeans R13 Skinny Cropped', 'Jeans', 'Women', 'Navy', 'M', 129.00, 'Elevate your denim collection with our Womens Jeans R13 Skinny Cropped in navy. The cropped length and navy color create a look that\'s both chic and versatile. Experience style and comfort in one exceptional pair of jeans.'),
(14, 'Womens Jeans R13 Leopard Print High Rise Skinny Beige', 'Jeans', 'Women', 'Leopard', 'M', 149.95, 'Embrace a fierce and stylish look with our Womens Jeans R13 Leopard Print High Rise Skinny. The leopard print design adds a touch of wildness to your outfit, while the high-rise fit offers a flattering silhouette. Step into a world of bold fashion that turns heads wherever you go.'),
(15, 'Nudie Jeans Lean Dean Dry Ever Black Jeans', 'Jeans', 'Men', 'Black', 'M', 179.00, 'Discover timeless elegance with our Nudie Jeans Lean Dean Dry Ever Black. The deep black hue exudes sophistication, and the quality craftsmanship ensures a lasting and comfortable fit. Elevate your denim collection with a pair that\'s versatile and effortlessly stylish.'),
(16, 'Carhartt Work In Progress Striped Tori Pocket Tee', 'T-shirt', 'Women', 'Purple', 'M', 29.99, 'Elevate your casual wardrobe with the Carhartt Work In Progress Striped Tori Pocket Tee. The dynamic purple stripes add a playful touch, while the pocket detail adds functionality and style. Crafted with attention to quality, this tee is a versatile and chic addition to your everyday look.'),
(17, 'Short Sleeve tee linen', 'T-shirt', 'Women', 'Lavender', 'XL', 34.95, 'Embrace breezy elegance with our Short Sleeve Tee Linen in a soothing lavender shade. The linen fabric offers comfort and breathability, making it a perfect choice for warmer days. Whether you\'re lounging or strolling, this tee combines style and comfort effortlessly.'),
(18, 'Hollister Long Sleeve Tee', 'T-shirt', 'Women', 'Blue', 'M', 24.99, 'Embrace casual comfort with the Hollister Long Sleeve Tee. The serene blue color and long sleeve design create a laid-back yet stylish look. Whether you\'re running errands or relaxing, this tee adds a touch of effortless charm to your outfit.'),
(19, 'The Couture Club Oversized Varsity T-shirt', 'T-shirt', 'Women', 'Black', 'XXL', 39.95, 'Make a bold statement with The Couture Club Oversized Varsity T-shirt. The oversized fit exudes urban style, while the black color adds a touch of edginess. Elevate your streetwear game with this eye-catching and fashionable piece.'),
(20, 'Monki striped t-shirt', 'T-shirt', 'Women', 'Striped Black and White', 'M', 19.99, 'Embrace timeless stripes with the Monki Striped T-Shirt. The black and white stripes offer a classic yet modern aesthetic, making it a versatile addition to your wardrobe. Step into effortless style with this chic and comfortable tee.'),
(21, 'Pajama T-shirt in Lilac Stripe-Purple', 'T-shirt', 'Women', 'White', 'L', 22.95, 'Experience comfort in style with the Pajama T-Shirt in Lilac Stripe-Purple. The white color and lilac stripes create a soothing and relaxed look. Whether you\'re lounging at home or enjoying a leisurely day, this tee adds a touch of elegance to your downtime.'),
(22, 'Santa Cruz oversized T-shirt with check heart print', 'T-shirt', 'Women', 'White', 'M', 49.99, 'Embrace a playful and artistic vibe with the Santa Cruz Oversized T-Shirt. The check heart print adds a touch of charm, while the oversized fit offers a trendy and comfortable style. Elevate your streetwear game with this unique and fashionable piece.'),
(23, 'Tommy Jeans Centre Badge Flag Logo Vertical Stripe T Shirt', 'T-shirt', 'Men', 'Red', 'M', 49.99, 'Elevate your casual ensemble with the Tommy Jeans Centre Badge Flag Logo Vertical Stripe T-Shirt. The bold red color and vertical stripes create a dynamic and eye-catching look. Step into a world of Tommy Jeans\' iconic style and quality craftsmanship.'),
(24, 'Hurley Everyday One and Only Boxed T-shirt', 'T-shirt', 'Men', 'Red', 'M', 27.99, 'Experience everyday comfort and style with the Hurley Everyday One and Only Boxed T-Shirt. The vibrant red color adds a pop of energy, making it a versatile choice for various occasions. Elevate your casual look with this classic and reliable tee.'),
(25, 'Men\'s Nike Black/Goldenrod Sportswear Logo T-Shirt', 'T-shirt', 'Men', 'Black', 'M', 34.95, 'Showcase your sporty style with the Men\'s Nike Black/Goldenrod Sportswear Logo T-Shirt. The iconic Nike logo and black color create a bold and athletic look. Whether you\'re hitting the gym or hanging out, this tee blends fashion and functionality seamlessly.'),
(26, 'Quicksilver return to the moon T-shirt', 'T-shirt', 'Men', 'White', 'M', 29.99, 'Embrace a touch of wanderlust with the Quiksilver Return to the Moon T-Shirt. The white color and unique design evoke a sense of adventure, making it a perfect choice for explorers at heart. Elevate your casual look with a tee that speaks to your free spirit.'),
(27, 'Jack & Jone Copenhagen Hort Leeve Crew Neck', 'T-shirt', 'Men', 'Navy', 'M', 25.95, 'Elevate your casual wardrobe with the Jack & Jones Copenhagen Hort Leeve Crew Neck. The navy color and crew neck design create a timeless and versatile look. Whether you\'re heading out or staying in, this tee offers comfort and style in one package.'),
(28, 'Wrangler Tee', 'T-shirt', 'Men', 'White', 'M', 19.95, 'Embrace classic Western charm with the Wrangler Tee. The white color and iconic Wrangler logo create a look that\'s both stylish and authentic. Elevate your casual ensemble with a touch of rugged elegance.'),
(29, 'Jack & Jones Wave T-Shirt', 'T-shirt', 'Men', 'Navy', 'M', 23.99, 'Ride the wave of style with the Jack & Jones Wave T-Shirt. The navy color and wave-inspired design capture a sense of adventure and relaxation. Whether you\'re at the beach or in the city, this tee adds a touch of cool to your look.'),
(30, 'Levi\'s Classic Graphic T Shirt', 'T-shirt', 'Men', 'Black', 'M', 29.95, 'Elevate your denim-inspired style with the Levi\'s Classic Graphic T Shirt. The black color and iconic Levi\'s graphic create a look that\'s both edgy and timeless. Embrace a touch of Americana and quality craftsmanship in one stylish tee.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `FK` (`prod_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
