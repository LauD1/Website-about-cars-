<?php
$dodano=$_GET["dodano"];
        if($dodano==1)
        {
            echo("Sukcess pracownik został pomyślnie dodany :)");
        }
// Nawiązanie połączenia z serwerem bazy danych
$mysqli = new mysqli("localhost", "ejak", "Erykjakubus10@", "ejak");
if ($mysqli->errno) {
printf("Nie można nawiązać połączenia z bazą danych:<br /> %s",$mysqli->error);
exit();
}
// Utworzenie zapytania
$query = "SELECT * FROM employees";
// Przesłanie zapytania do bazy danych
$result = $mysqli->query($query);
if (!$result)
{
    printf("Query failed: %s\n", $result->error);
}
printf("<h1>Employees</h1>");
printf("<table border=\"1\">");
$fields = $result->fetch_fields();
printf("<tr><th>%s</th><th>%s</th><th>%s</th><th>%s</th><th>%s</th><th>%s</th></tr>", $fields[0]->name,$fields[1]->name,$fields[2]->name, $fields[3]->name, $fields[4]->name, $fields[5]->name);

// Pobranie wyników w postaci tablicy asocjacyjnej
while ($row = $result->fetch_array(MYSQLI_ASSOC))
{
    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$row['employeeNumber'],$row['lastName'],$row['firstName'], $row['email'], $row['officeCode'], $row['jobTitle']);
}
printf("</table>");
printf("<i>query returned %d rows </i>", $result->num_rows);
// Zwolnienie pamięci
$result->free();
// Zamknięcie połączenia
$mysqli->close();
?>