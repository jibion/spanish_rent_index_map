<?php

include 'config.php';

// PHP program to connect with
// localserver database
$user = $userdb;
$password = $pwddb;
$database = $dbdb;
$servername = $serverdb;

$mysqli = new mysqli(
    $servername,
    $user,
    $password,
    $database
);

if ($mysqli->connect_error) {
    die('Connect Error (' .
        $mysqli->connect_errno . ') ' .
        $mysqli->connect_error);
}

// SQL query to select data
// from database
$sql2 = "
with national_average as 
(select avg(rent_sqm_median) average from data_provincias dp2
where `year` = 2020
and `type` = 'VC' 
group by `year`)
select
	concat('ES.', p.CPRO)               id,
    p.LITPRO                            x,
    p.abr                               abr,
	sum(case when `year` = 2020 then truncate(rent_sqm_median,2) else 0 end)         value_2020,
    sum(case when `year` = 2019 then truncate(rent_sqm_median,2) else 0 end)        value_2019,
    sum(case when `year` = 2018 then truncate(rent_sqm_median,2) else 0 end)        value_2018,
    sum(case when `year` = 2017 then truncate(rent_sqm_median,2) else 0 end)        value_2017,
    sum(case when `year` = 2016 then truncate(rent_sqm_median,2) else 0 end)        value_2016,
    sum(case when `year` = 2015 then truncate(rent_sqm_median,2) else 0 end)        value_2015,
    sum(case when `year` = 2020 then truncate(rent_total_median,2) else 0 end)         total_m_2020,
    sum(case when `year` = 2019 then truncate(rent_total_median,2) else 0 end)        total_m_2019,
    sum(case when `year` = 2018 then truncate(rent_total_median,2) else 0 end)        total_m_2018,
    sum(case when `year` = 2017 then truncate(rent_total_median,2) else 0 end)        total_m_2017,
    sum(case when `year` = 2016 then truncate(rent_total_median,2) else 0 end)        total_m_2016,
    sum(case when `year` = 2015 then truncate(rent_total_median,2) else 0 end)        total_m_2015,
    sum(case when `year` = 2020 then truncate(rent_total_p25,2) else 0 end)         total_p25_2020,
    sum(case when `year` = 2019 then truncate(rent_total_p25,2) else 0 end)        total_p25_2019,
    sum(case when `year` = 2018 then truncate(rent_total_p25,2) else 0 end)        total_p25_2018,
    sum(case when `year` = 2017 then truncate(rent_total_p25,2) else 0 end)        total_p25_2017,
    sum(case when `year` = 2016 then truncate(rent_total_p25,2) else 0 end)        total_p25_2016,
    sum(case when `year` = 2015 then truncate(rent_total_p25,2) else 0 end)        total_p25_2015,
    sum(case when `year` = 2020 then truncate(rent_total_p75,2) else 0 end)         total_p75_2020,
    sum(case when `year` = 2019 then truncate(rent_total_p75,2) else 0 end)        total_p75_2019,
    sum(case when `year` = 2018 then truncate(rent_total_p75,2) else 0 end)        total_p75_2018,
    sum(case when `year` = 2017 then truncate(rent_total_p75,2) else 0 end)        total_p75_2017,
    sum(case when `year` = 2016 then truncate(rent_total_p75,2) else 0 end)        total_p75_2016,
    sum(case when `year` = 2015 then truncate(rent_total_p75,2) else 0 end)        total_p75_2015
from
	data_provincias dp
join provincias p on
	dp.cpro = p.cpro
join national_average na
where
	type = 'VC'
group by 
	id, x, abr
order by
	id asc;";
$result = $mysqli->query($sql2);

// Fetching data from the database
// and storing in array of objects
while ($row = $result->fetch_array()) {
    $provincias[] = array(
        "id" => $row["id"],
        "value" => $row["value_2020"],
        "x" => $row["x"],
        "abr" => $row["abr"],
        'm2_rent' => [
            ["2015", $row["value_2015"]],
            ["2016", $row["value_2016"]],
            ["2017", $row["value_2017"]],
            ["2018", $row["value_2018"]],
            ["2019", $row["value_2019"]],
            ["2020", $row["value_2020"]]
        ],
        'total_rent' => [
            ["2015", $row["total_m_2015"], $row["total_p25_2015"], $row["total_p75_2015"]],
            ["2016", $row["total_m_2016"], $row["total_p25_2016"], $row["total_p75_2016"]],
            ["2017", $row["total_m_2017"], $row["total_p25_2017"], $row["total_p75_2017"]],
            ["2018", $row["total_m_2018"], $row["total_p25_2018"], $row["total_p75_2018"]],
            ["2019", $row["total_m_2019"], $row["total_p25_2019"], $row["total_p75_2019"]],
            ["2020", $row["total_m_2020"], $row["total_p25_2020"], $row["total_p75_2020"]]
        ],
    );
}

// Creating a dynamic JSON file
$file = "./data/data_provincias_vc.json";

// Converting data into JSON and putting
// into the file
// Checking for its creation
if (file_put_contents(
    $file,
    json_encode($provincias)
))
    echo ("File created");
else
    echo ("Failed");

// Closing the database
$mysqli->close();
