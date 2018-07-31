#Database SQL Script 

CREATE DATABASE test; 

CREATE TABLE `listitems` (

`id` int(11) NOT NULL,

`name` varchar(100) NOT NULL,   

`detail` varchar(400) NOT NULL,   

`is_completed` enum('yes','no') 

NOT NULL DEFAULT 'no' ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1; 

ALTER TABLE `listitems` ADD PRIMARY KEY (`id`);

-- -- Dumping data for table `listitems` -- 

INSERT INTO `listitems` (`id`, `name`, `detail`, `is_completed`) 

  VALUES (1, 'Shopping', 'Go for shopping on weekend', 'no'),

         (2, 'Watch Movie', 'After Shopping, go to Cinema and watch movie', 'no'),

         (3, 'Buy Books', 'Buy books from market', 'no'), 

         (4, 'Go for Running', 'In morning go out to park for running', 'no'), 

         (5, 'Cooking', 'Do cooking this weekend', 'no'), 

         (6, 'Write and Article', 'Write an article for the blog', 'no');
