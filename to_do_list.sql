CREATE TABLE `tasks` (
  `taskid` int(11) NOT NULL,
  `taskname` varchar(50) NOT NULL,
  `tasktext` text NOT NULL,
  `taskchecked` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskid`);

ALTER TABLE `tasks`
  MODIFY `taskid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
