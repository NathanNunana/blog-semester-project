<?php
include_once 'config.php';
include_once 'tables.php';
include 'connect.php';

// Creating a test user
$sql_user = "REPLACE INTO `users`(
        `id`,
        `username`,
        `email`,
        `role`,
        `password`
        ) VALUES (
            '1',
            'nathan',
            'kulewoshienathan@gmail.com',
            'Admin',
            'password123'
        )"; 

// Populating the database with some initial posts
$sql_posts = "REPLACE INTO `posts`(
        `id`,
        `user_id`,
        `category`, 
        `title`, 
        `description`, 
        `date`, 
        `image`, 
        `published`, 
        `featured`
        ) VALUES (
            '1',
            '1',
           'Coding',
           'Is the Designer Facing Extinction?',
           'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo…',
           'May 3, 2022',
           'img_1.jpg',
           '1',
           '1'
        ),(
            '2',
            '1',
           'Coding',
           'Guide to WordPress Post Revisions',
           'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo…',
           'May 7, 2022',
           'img_2.jpg',
           '1',
           '1'
        ),(
            '3',
            '1',
           'Hosting',
           'How To Choose The Right Hosting For Your Blog',
           'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo…',
           'May 8, 2022',
           'img_3.jpg',
           '1',
           '1'
        ),(
            '4',
            '1',
           'Coding',
           'Getting Started with JavaScript Promises',
           'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo…',
           'May 8, 2022',
           'img_4.jpg',
           '1',
           '1'
        ),(
            '5',
            '1',
           'Design',
           'Teach Your Kids to Code Playground with Tynker',
           'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo…',
           'May 8, 2022',
           'img-7.jpg',
           '1',
           '1'
        ),(
            '6',
            '1',
           'Coding',
           'Event Emitters in Node.js',
           'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo…',
           'May 8, 2022',
           'mac.jpeg',
           '1',
           '1'
        )";

// Checking and executing the query
if ($conn->query($sql_user)) {
    if($conn->query($sql_posts)){
        echo "[Initial user and initial posts inserted successfully].\n ";
        header("Location: http://localhost/nathanblog/login.php");
        exit();
    }else{
        echo "[Unable to insert posts into the database].\n ";
    }
} else {
    echo "[posts insertion unsuccessful].\n ";
}
