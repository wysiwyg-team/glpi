<?php
session_start();

/**
 * Created by PhpStorm.
 * User: Ankush
 * Date: 4/20/2018
 * Time: 1:07 PM
 */
include("db.php");
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}

$db = Database::getInstance();
$mysqli = $db->getConnection();

$query = "INSERT INTO custom_export_worksheet (ticket_no, ticket_task_id, task_description, time_spent, resource_name, date_assigned, date_ended, cost_category, rate, societe_id) 
SELECT GTC.tickets_id ticket_no, GTC.id ticket_task_id, GTC.name task_description, GTC.actiontime time_spent, users.name resource_name, GTC.begin_date date_assigned,
GTC.end_date date_ended, CCC.id cost_category, CCC.rate rate, CTS.societe_id societe_id FROM custom_ticket_category as CTC
LEFT OUTER JOIN glpi_ticketcosts GTC ON CTC.ticketcosts_id = GTC.id
right join custom_cost_category as CCC on CCC.id = CTC.cost_category
left join glpi_users as users on users.id = GTC.tickets_id
left join custom_tickets_societe CTS on CTS.tickets_id = GTC.tickets_id WHERE
NOT EXISTS (SELECT *  FROM custom_export_worksheet where ticket_task_id = GTC.id)
";

$result = $mysqli->query($query);
//print_r($result);
?>
<a href='logout.php'>Click here to log out</a>
