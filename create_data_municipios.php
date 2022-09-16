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
with total_rents as (
    select
        sum(n_obs) total_rents
    from
        data_provincias dp2
    where
        `type` = 'VC'
        and `year` = 2020),
    total_rents_region as (
    select
        p.CCA,
        sum(n_obs) total_rents
    from
        data_provincias dp2
    join 
        provincias p on dp2.cpro = p.CPRO 
    where
        `type` = 'VC'
        and `year` = 2020
    group by CCA)
    select
        concat('ES.', p.CPRO) id,
        p.LITPRO x,
        p.abr abr,
        c.CCA cca,
        c.LITCA y,
        sum(case when `year` = 2020 then n_obs else 0 end) n_obs,
        tr.total_rents nation_obs,
        trr.total_rents region_obs,
        truncate((sum(case when `year` = 2020 then n_obs else 0 end)/tr.total_rents*100),2) rate_total,
        truncate((sum(case when `year` = 2020 then n_obs else 0 end)/trr.total_rents*100),2) rate_region,
        sum(case when `year` = 2020 then truncate(rent_sqm_median, 2) else 0 end) sqm_median_2020,
        sum(case when `year` = 2019 then truncate(rent_sqm_median, 2) else 0 end) sqm_median_2019,
        sum(case when `year` = 2018 then truncate(rent_sqm_median, 2) else 0 end) sqm_median_2018,
        sum(case when `year` = 2017 then truncate(rent_sqm_median, 2) else 0 end) sqm_median_2017,
        sum(case when `year` = 2016 then truncate(rent_sqm_median, 2) else 0 end) sqm_median_2016,
        sum(case when `year` = 2015 then truncate(rent_sqm_median, 2) else 0 end) sqm_median_2015,
        sum(case when `year` = 2020 then truncate(rent_sqm_p25, 2) else 0 end) sqm_p25_2020,
        sum(case when `year` = 2019 then truncate(rent_sqm_p25, 2) else 0 end) sqm_p25_2019,
        sum(case when `year` = 2018 then truncate(rent_sqm_p25, 2) else 0 end) sqm_p25_2018,
        sum(case when `year` = 2017 then truncate(rent_sqm_p25, 2) else 0 end) sqm_p25_2017,
        sum(case when `year` = 2016 then truncate(rent_sqm_p25, 2) else 0 end) sqm_p25_2016,
        sum(case when `year` = 2015 then truncate(rent_sqm_p25, 2) else 0 end) sqm_p25_2015,
        sum(case when `year` = 2020 then truncate(rent_sqm_p75, 2) else 0 end) sqm_p75_2020,
        sum(case when `year` = 2019 then truncate(rent_sqm_p75, 2) else 0 end) sqm_p75_2019,
        sum(case when `year` = 2018 then truncate(rent_sqm_p75, 2) else 0 end) sqm_p75_2018,
        sum(case when `year` = 2017 then truncate(rent_sqm_p75, 2) else 0 end) sqm_p75_2017,
        sum(case when `year` = 2016 then truncate(rent_sqm_p75, 2) else 0 end) sqm_p75_2016,
        sum(case when `year` = 2015 then truncate(rent_sqm_p75, 2) else 0 end) sqm_p75_2015
    from
        data_provincias dp
    join provincias p on
        dp.cpro = p.cpro
    join comunidades c on
        p.CCA = c.CCA
    join total_rents tr
    join total_rents_region  trr on p.CCA = trr.cca 
    where
        type = 'VC'
    group by 
        id,
        x,
        abr,
        cca,
        y
    order by
        id asc;";
$result = $mysqli->query($sql2);

// Fetching data from the database
// and storing in array of objects
while ($row = $result->fetch_array()) {
    $provincias[] = array(
        "id" => $row["id"],
        "value" => $row["sqm_median_2020"],
        "n_obs" => $row["n_obs"],
        "nation_obs" => $row["nation_obs"],
        "region_obs" => $row["region_obs"],
        "rate_total" => $row["rate_total"],
        "rate_region" => $row["rate_region"],
        "x" => $row["x"],
        "abr" => $row["abr"],
        "cca" => $row["cca"],
        "region" => $row["y"],
        'sqm_rent' => [
            ["2015", $row["sqm_median_2015"], $row["sqm_p25_2015"], $row["sqm_p75_2015"]],
            ["2016", $row["sqm_median_2016"], $row["sqm_p25_2016"], $row["sqm_p75_2016"]],
            ["2017", $row["sqm_median_2017"], $row["sqm_p25_2017"], $row["sqm_p75_2017"]],
            ["2018", $row["sqm_median_2018"], $row["sqm_p25_2018"], $row["sqm_p75_2018"]],
            ["2019", $row["sqm_median_2019"], $row["sqm_p25_2019"], $row["sqm_p75_2019"]],
            ["2020", $row["sqm_median_2020"], $row["sqm_p25_2020"], $row["sqm_p75_2020"]]
        ],
    );
}

// Creating a dynamic JSON file
$file = "./data/data_vc.json";

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
