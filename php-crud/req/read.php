<?php
    function read($conn){
        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute([]);

        if ($stmt->rowCount() > 0) {
            $users = $stmt->fetchAll();
        }else $users = 0;

        return $users;
    }

    function readByID($conn, $id){
        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        if ($stmt->rowCount() > 0) {
            $users = $stmt->fetch();
        }else $users = 0;

        return $users;
    }

    