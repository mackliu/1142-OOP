<?php

public function all(...$arg)
    {
        $sql = "select * from  `$this->table`";

        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }

        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        //echo $sql;

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    ?>