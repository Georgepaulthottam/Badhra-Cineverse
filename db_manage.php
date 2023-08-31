<body><?php
$server = 'localhost';
$username = "root";
$db ="";
$password = "";

$conndb = new mysqli($server, $username,$password, $db);
$DB=$_POST['db'];

$sql= ("CREATE DATABASE ".$DB. "");
$res = mysqli_query($conndb, $sql);
 mysqli_select_db($conndb, $DB);
$sql2="CREATE TABLE `absent_dates` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);CREATE TABLE `approved_attendance` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
);CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
);CREATE TABLE `attendance_request` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp()
);CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `details` varchar(100) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `billno` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
);CREATE TABLE `daily_expense` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(70) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
);CREATE TABLE `miscellaneous` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` int(50) NOT NULL,
  `purpose` text DEFAULT NULL,
  `remark` varchar(50) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` date DEFAULT curdate()
);CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `end_time` time NOT NULL,
  `status` varchar(50) NOT NULL
);CREATE TABLE `schedule_day` (
  `id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `day_no` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `location` varchar(50) NOT NULL,
  `pooja_time` timestamp NULL DEFAULT NULL,
  `bata` int(11) NOT NULL DEFAULT 1
);CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `attendance` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
);";


 
if(mysqli_multi_query($conndb,$sql2)){
            do {
                /* store first result set */
                if ($result = mysqli_store_result($conndb)) {
                    while ($row = mysqli_fetch_row($result)) {
                        printf("%s\n", $row[0]);
                    }
                    mysqli_free_result($result);
                }
                /* print divider */
                if (mysqli_more_results($conndb)) {
                    printf("-----------------\n");
                }
            } while (mysqli_next_result($conndb));
        }

if($result){
    echo("hello everynyan");
}
else{
    echo ("hello baka");
}

?>
</body>