<?php

class DataBase
{
    private static $connection;

    private static function server_error()
    {
        // Redirect to the error page
        header("Location: /error.php");
        exit();
    }

    public static function connect($hostname = "localhost", $username = "toni", $password = "admin", $database = "toni")
    {
        try {
            if (!isset(self::$connection)) {
                self::$connection = new mysqli($hostname, $username, $password, $database);
            }
            // Check the connection
            if (self::$connection->connect_error) {
                die("Connection failed: " . self::$connection->connect_error);
            }
        } catch (Exception $e) {
            self::server_error();
        }
    }

    public static function runQuery($query, ...$params)
    {
        // Check if the connection has been established
        if (!self::$connection) {
            error_log("Error: Connection not established. Conencting with default parameters.");
            self::connect();
        }

        // Prepare the statement
        $stmt = self::$connection->prepare($query);

        // Check if the statement was prepared successfully
        if (!$stmt) {
            return "Error: " . self::$connection->error;
        }

        // Dynamically bind parameters
        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        // Execute the query
        $result = $stmt->execute();

        // Check if the query was successful
        if ($result) {
            $data = [];

            // Get results
            $result = $stmt->get_result();

            if (!$result) {
                // Handle the SQL error
                return true;
            }

            // Fetch the results
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            // Free the result set
            $result->free();
        } else {
            // Return an error message if the query fails
            $data = "Error: " . $query . "<br>" . $stmt->error;
        }

        // Close the statement
        $stmt->close();

        return $data;
    }

    public static function closeConnection()
    {
        // Close the database connection
        self::$connection->close();
    }


}

?>