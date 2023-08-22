<?php

class Client
{
    function selectClientsActives($conn)
    {
        $status = 'active';
        $sql = "SELECT * FROM clients WHERE status = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $status);
        $stmt->execute();
        $clients = $stmt->get_result();

        return $clients;
    }

    function insert($conn, $name, $phone, $email, $status)
    {
        $sql = "INSERT INTO clients (name, phone, email, status) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $name, $phone, $email, $status);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function update($conn, $id)
    {
        $sql = "UPDATE clients SET status = ? WHERE id = ?";
        $status = 'inactive';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $status, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function getThirdRegistry($conn) {

        $sql = "SELECT * FROM clients c where c.status = 'active' LIMIT 1 OFFSET 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $client = $stmt->get_result();

        return $client->fetch_assoc();

    }
}
