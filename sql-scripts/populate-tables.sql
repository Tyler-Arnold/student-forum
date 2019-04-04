INSERT INTO `s5063037`.`forum_users`
(`id`,
`username`,
`password`)
VALUES
(null,
"Jeff Puddlesby-Sponk",
"password1");

INSERT INTO `s5063037`.`forum_users`
(`id`,
`username`,
`password`)
VALUES
(null,
"Hugh Hughson",
"password2");

INSERT INTO `s5063037`.`forum_users`
(`id`,
`username`,
`password`)
VALUES
(null,
"Tobar",
"password3");

INSERT INTO `s5063037`.`forum_users`
(`id`,
`username`,
`password`)
VALUES
(null,
"Ograth the Mighty",
"password");

INSERT INTO `s5063037`.`forum_users`
(`id`,
`username`,
`password`)
VALUES
(null,
"Doombringer",
"password5");

INSERT INTO `s5063037`.`forum_messages`
(`id`,
`sender`,
`recipient`,
`message_body`)
VALUES
(null,
4,
69,
"Different test message!");

INSERT INTO `s5063037`.`forum_messages`
(`id`,
`sender`,
`recipient`,
`message_body`)
VALUES
(null,
3,
69,
"I'm the best programmer in the world!");

INSERT INTO `s5063037`.`forum_messages`
(`id`,
`sender`,
`recipient`,
`message_body`)
VALUES
(null,
2,
69,
"Nobody is better at programming than me!");

INSERT INTO `s5063037`.`forum_messages`
(`id`,
`sender`,
`recipient`,
`message_body`)
VALUES
(null,
1,
69,
"You shouldn't be able to send messages to yourself");

INSERT INTO `s5063037`.`forum_user_messages_link`
(`id`,
`user_id`,
`message_id`)
VALUES
(null,
1,
1);

INSERT INTO `s5063037`.`forum_user_messages_link`
(`id`,
`user_id`,
`message_id`)
VALUES
(null,
1,
2);

INSERT INTO `s5063037`.`forum_user_messages_link`
(`id`,
`user_id`,
`message_id`)
VALUES
(null,
1,
3);

INSERT INTO `s5063037`.`forum_user_messages_link`
(`id`,
`user_id`,
`message_id`)
VALUES
(null,
1,
4);

INSERT INTO `s5063037`.`forum_user_messages_link`
(`id`,
`user_id`,
`message_id`)
VALUES
(null,
2,
4);


INSERT INTO `s5005478`.`forum_appointments`
(`id`,
`sender`,
`recipient`,
`date_time`,
`location`,
`status`)
VALUES
('5', '5', '1', '2019-04-05 00:00:00', 'somewhere', 'accepted'),
('2', '3', '1', '2019-04-05 00:00:00', 'somewhere', 'accepted'),
('3', '5', '1', '2019-04-05 00:00:00', 'somewhere', 'accepted'),
('4', '5', '1', '2019-04-07 00:00:00', 'somewhere', 'accepted'),
('6', '5', '1', '2019-04-05 00:00:00', NULL, 'accepted'),
('7', '7', '1', '2019-04-04 00:00:00', NULL, 'accepted'),
('8', '6', '1', '2019-04-12 00:00:00', NULL, 'accepted');