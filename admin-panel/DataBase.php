<?php

namespace DataBase;

use PDO;
use PDOException;

class DataBase
{

    private $connection;
    private $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];


    function __construct()
    {

        try {

            $this->connection = new PDO ("mysql:host=" . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD, $this->option);

        } catch (PDOException $e) {

            echo "erorr! :: " . $e->getMessage();

        }

    }

    public function createTable($sql)
    {

        try {

            $this->connection->exec($sql);
            return true;

        } catch (PDOException $e) {

            echo "Create Table error! :: " . $e->getMessage();
            return false;

        }

    }

    public function select($sql, $values = NULL)
    {

        try {

            if ($values == null) {

                return $this->connection->query($sql);

            } else {

                $stmt = $this->connection->prepare($sql);
                $stmt->execute($values);
                return $stmt;
            }

        } catch (PDOException $e) {

            echo "Select error! :: " . $e->getMessage();
            return false;

        }


    }


    public function insert($tableName, $fields, $values)
    {

        try {

            $sql = "INSERT INTO " . $tableName . "(" . implode(', ', $fields) . " , created_at) VALUES ( :" . implode(',:', $fields) . ', now())';
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_combine($fields, $values));
            return true;

        } catch (PDOException $e) {

            echo "Insert error! :: " . $e->getMessage();
            return false;

        }

    }

    public function update($tableName, $id, $fields, $values)
    {

        try {

            $sql = "UPDATE `" . $tableName . "` SET";

            foreach (array_combine($fields, $values) as $field => $value) {

                if ($value) {
                    $sql .= '`' . $field . '` = ? ,';
                } else {
                    $sql .= '`' . $field . '` = NULL ,';
                }
            }
            $sql .= '`updated_at` = now() WHERE `id` = ? ';

            $stmt = $this->connection->prepare($sql);

            $effectedRows = $stmt->execute(array_merge(array_filter(array_values($values)), [$id]));


            if (isset($effectedRows)) {
                return true;
            }


        } catch (PDOException $e) {

            echo "Update error! :: " . $e->getMessage();
            return false;

        }

    }

    public function delete($tableName, $id)
    {

        try {

            $sql = "DELETE FROM `" . $tableName . "` WHERE `id` = ? ";
            $stmt = $this->connection->prepare($sql);
            $effectedRows = $stmt->execute([$id]);
            if (isset($effectedRows)) {
                echo 'record deleted';
            }
            return true;

        } catch (PDOException $e) {

            echo "Delete error :: " . $e->getMessage();
            return false;

        }

    }

}



