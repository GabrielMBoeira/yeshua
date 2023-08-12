<?php

class Company
{
    function getStatusCompany($conn)
    {
        $sql = "SELECT * FROM company WHERE id = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $statusCompany = $result->fetch_assoc();

        if ($statusCompany) {
            return $statusCompany['status'];
        }

        return $statusCompany;
    }

    function updateStatusCompany($conn, $status)
    {
        $sql = "UPDATE company SET status = ? WHERE id = 1";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $status);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
